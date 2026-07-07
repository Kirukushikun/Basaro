<?php

namespace Database\Seeders;

use App\Models\Lesson;
use App\Models\Teacher;
use App\Models\User;
use App\Models\UserTrack;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DashboardSeeder extends Seeder
{
    public function run(): void
    {
        // Ensure lessons exist before seeding student progress
        if (Lesson::count() === 0) {
            $this->command->warn('No lessons found. Run DatabaseSeeder first or run: php artisan db:seed');
            return;
        }

        // Ensure at least one teacher exists
        if (Teacher::count() === 0) {
            Teacher::create([
                'name'     => 'Test Teacher',
                'email'    => 'teacher@test.com',
                'password' => Hash::make('password'),
            ]);
        }

        $this->command->info('Seeding dashboard test data...');

        // Seed a note for the "Message of the Day" card
        if (DB::table('note')->count() === 0) {
            DB::table('note')->insert([
                'content'    => 'Magpatuloy sa pag-aaral! Kaya mo yan! 📚',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // ---------------------------------------------------------------
        // Backfill grade_level for existing users that don't have one.
        // Distributes them evenly across grades 7–10 in round-robin order.
        // ---------------------------------------------------------------
        $gradesPool = ['7', '8', '9', '10'];
        $ungradedUsers = User::whereNull('grade_level')->get();
        foreach ($ungradedUsers as $i => $u) {
            $u->update(['grade_level' => $gradesPool[$i % 4]]);
        }
        $this->command->info("Assigned grade levels to {$ungradedUsers->count()} existing users.");

        $lessons = Lesson::all();

        // ---------------------------------------------------------------
        // Student batches — 5 per grade × 4 grades = 20 students
        // Each batch has a target performance range (as 0.0–1.0 ratio of
        // total_scores) so every performance band appears in the chart.
        // ---------------------------------------------------------------
        $batches = [
            // [grade, performance_band, score_ratio_min, score_ratio_max, active_this_week, login_days_ago]
            ['grade' => '7',  'band' => 'excellent',      'min' => 0.90, 'max' => 1.00, 'active' => true,  'days_ago' => 1],
            ['grade' => '7',  'band' => 'excellent',      'min' => 0.92, 'max' => 1.00, 'active' => true,  'days_ago' => 3],
            ['grade' => '7',  'band' => 'good',           'min' => 0.75, 'max' => 0.89, 'active' => true,  'days_ago' => 2],
            ['grade' => '7',  'band' => 'needs_guidance', 'min' => 0.60, 'max' => 0.74, 'active' => false, 'days_ago' => 10],
            ['grade' => '7',  'band' => 'struggling',     'min' => 0.30, 'max' => 0.59, 'active' => false, 'days_ago' => 20],

            ['grade' => '8',  'band' => 'excellent',      'min' => 0.91, 'max' => 1.00, 'active' => true,  'days_ago' => 1],
            ['grade' => '8',  'band' => 'good',           'min' => 0.76, 'max' => 0.89, 'active' => true,  'days_ago' => 4],
            ['grade' => '8',  'band' => 'good',           'min' => 0.80, 'max' => 0.89, 'active' => false, 'days_ago' => 9],
            ['grade' => '8',  'band' => 'needs_guidance', 'min' => 0.62, 'max' => 0.74, 'active' => false, 'days_ago' => 14],
            ['grade' => '8',  'band' => 'struggling',     'min' => 0.20, 'max' => 0.55, 'active' => false, 'days_ago' => 30],

            ['grade' => '9',  'band' => 'excellent',      'min' => 0.95, 'max' => 1.00, 'active' => true,  'days_ago' => 2],
            ['grade' => '9',  'band' => 'good',           'min' => 0.77, 'max' => 0.88, 'active' => true,  'days_ago' => 5],
            ['grade' => '9',  'band' => 'needs_guidance', 'min' => 0.61, 'max' => 0.73, 'active' => false, 'days_ago' => 8],
            ['grade' => '9',  'band' => 'needs_guidance', 'min' => 0.63, 'max' => 0.72, 'active' => false, 'days_ago' => 12],
            ['grade' => '9',  'band' => 'struggling',     'min' => 0.10, 'max' => 0.50, 'active' => false, 'days_ago' => null],

            ['grade' => '10', 'band' => 'excellent',      'min' => 0.93, 'max' => 1.00, 'active' => true,  'days_ago' => 1],
            ['grade' => '10', 'band' => 'good',           'min' => 0.78, 'max' => 0.87, 'active' => true,  'days_ago' => 6],
            ['grade' => '10', 'band' => 'needs_guidance', 'min' => 0.65, 'max' => 0.74, 'active' => false, 'days_ago' => 11],
            ['grade' => '10', 'band' => 'struggling',     'min' => 0.25, 'max' => 0.55, 'active' => false, 'days_ago' => null],
            ['grade' => '10', 'band' => 'struggling',     'min' => 0.15, 'max' => 0.45, 'active' => false, 'days_ago' => null],
        ];

        foreach ($batches as $idx => $config) {
            $n = $idx + 1;
            $lastLogin = $config['days_ago'] === null
                ? null
                : Carbon::now()->subDays($config['days_ago']);

            $student = User::firstOrCreate(
                ['email' => "dash_student{$n}@test.com"],
                [
                    'name'          => "Dashboard Student {$n}",
                    'password'      => Hash::make('password'),
                    'grade_level'   => $config['grade'],
                    'last_login_at' => $lastLogin,
                ]
            );

            $this->seedStudentTracks($student->id, $lessons, $config['min'], $config['max']);
        }

        // ---------------------------------------------------------------
        // Extra student with only in_progress (no completed) — tests the
        // "stuck on same lesson" alert (updated_at older than 7 days).
        // ---------------------------------------------------------------
        $stuckStudent = User::firstOrCreate(
            ['email' => 'stuck@test.com'],
            [
                'name'          => 'Stuck Student',
                'password'      => Hash::make('password'),
                'grade_level'   => '8',
                'last_login_at' => Carbon::now()->subDays(10),
            ]
        );

        $firstLesson = $lessons->first();
        if ($firstLesson) {
            [$track] = [UserTrack::firstOrCreate(
                ['user_id' => $stuckStudent->id, 'lesson_id' => $firstLesson->id],
                ['status' => 'in_progress', 'score' => 0, 'attempts' => 1]
            )];
            // Back-date updated_at so the "stuck" alert fires
            UserTrack::where('id', $track->id)->update(['updated_at' => Carbon::now()->subDays(10)]);
        }

        $this->command->info('Dashboard seeder complete. Summary:');
        $this->command->table(
            ['Metric', 'Count'],
            [
                ['Total students',   User::count()],
                ['Active this week', User::where('last_login_at', '>=', Carbon::now()->subDays(7))->count()],
                ['Completed tracks', UserTrack::where('status', 'completed')->count()],
                ['In-progress tracks', UserTrack::where('status', 'in_progress')->count()],
            ]
        );
    }

    /**
     * Seed completed UserTrack rows for every lesson, with scores that land
     * in the given [minRatio, maxRatio] performance band, plus one in_progress
     * track to represent a lesson currently being worked on.
     */
    private function seedStudentTracks(int $userId, $lessons, float $minRatio, float $maxRatio): void
    {
        $lessonList  = $lessons->values();
        $totalLessons = $lessonList->count();

        // Complete the first 60–80 % of lessons so different students are at
        // different points, making the data feel realistic.
        $completedUpTo = (int) floor($totalLessons * 0.7);

        foreach ($lessonList as $i => $lesson) {
            $maxScore = max((int) $lesson->total_scores, 1);

            if ($i < $completedUpTo) {
                // Score within the target performance band
                $ratio = $minRatio + mt_rand(0, 100) / 100 * ($maxRatio - $minRatio);
                $score = (int) round($maxScore * $ratio);
                $score = max(0, min($score, $maxScore));

                UserTrack::firstOrCreate(
                    ['user_id' => $userId, 'lesson_id' => $lesson->id],
                    [
                        'status'   => 'completed',
                        'score'    => $score,
                        'attempts' => mt_rand(1, 3),
                    ]
                );
            } elseif ($i === $completedUpTo) {
                // Current lesson — in_progress
                UserTrack::firstOrCreate(
                    ['user_id' => $userId, 'lesson_id' => $lesson->id],
                    [
                        'status'   => 'in_progress',
                        'score'    => 0,
                        'attempts' => 0,
                    ]
                );
                break; // Don't add rows for future lessons
            }
        }
    }
}
