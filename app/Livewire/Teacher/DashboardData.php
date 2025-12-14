<?php

namespace App\Livewire\Teacher;

use App\Models\User;
use App\Models\Lesson;
use App\Models\UserTrack;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardData extends Component
{
    public function render()
    {
        // Get all students with their tracking data
        $students = User::with(['trackings.lesson'])->get();
        
        // Calculate statistics
        $stats = $this->calculateStats($students);
        $performanceDistribution = $this->getPerformanceDistribution($students);
        $gradeDistribution = $this->getGradeDistribution();
        $topPerformers = $this->getTopPerformers($students);
        $recentAlerts = $this->getRecentAlerts($students);

        return view('livewire.teacher.dashboard-data', [
            'totalStudents' => $stats['total_students'],
            'overallPerformance' => $stats['overall_performance'],
            'totalLessons' => $stats['total_lessons'],
            'activeThisWeek' => $stats['active_this_week'],
            'performanceDistribution' => $performanceDistribution,
            'gradeDistribution' => $gradeDistribution,
            'topPerformers' => $topPerformers,
            'alerts' => $recentAlerts,
        ]);
    }

    /**
     * Calculate main dashboard statistics
     */
    private function calculateStats($students)
    {
        $totalStudents = $students->count();
        $totalLessons = Lesson::count();
        
        // Calculate overall average performance
        $completedTracks = UserTrack::where('status', 'completed')
            ->with('lesson')
            ->get();
        
        $overallPerformance = 0;
        if ($completedTracks->count() > 0) {
            $overallPerformance = round(
                $completedTracks->avg(function ($track) {
                    if (!$track->lesson || $track->lesson->total_scores == 0) {
                        return 0;
                    }
                    return ($track->score / $track->lesson->total_scores) * 100;
                })
            );
        }

        // Students active in the last 7 days
        $activeThisWeek = User::where('last_login_at', '>=', Carbon::now()->subDays(7))
            ->count();

        return [
            'total_students' => $totalStudents,
            'overall_performance' => $overallPerformance,
            'total_lessons' => $totalLessons,
            'active_this_week' => $activeThisWeek,
        ];
    }

    /**
     * Get performance distribution (Excellent, Good, Needs Guidance, Struggling)
     */
    private function getPerformanceDistribution($students)
    {
        $excellent = 0; // >= 90%
        $good = 0;      // 75-89%
        $needsGuidance = 0; // 60-74%
        $struggling = 0;    // < 60%

        foreach ($students as $student) {
            $completed = $student->trackings->where('status', 'completed');
            
            if ($completed->isEmpty()) {
                continue;
            }

            $average = round(
                $completed->avg(function ($track) {
                    if (!$track->lesson || $track->lesson->total_scores == 0) {
                        return 0;
                    }
                    return ($track->score / $track->lesson->total_scores) * 100;
                })
            );

            if ($average >= 90) {
                $excellent++;
            } elseif ($average >= 75) {
                $good++;
            } elseif ($average >= 60) {
                $needsGuidance++;
            } else {
                $struggling++;
            }
        }

        return [
            'excellent' => $excellent,
            'good' => $good,
            'needs_guidance' => $needsGuidance,
            'struggling' => $struggling,
            'max' => max($excellent, $good, $needsGuidance, $struggling) ?: 1, // For scaling
        ];
    }

    /**
     * Get grade level distribution
     */
    private function getGradeDistribution()
    {
        $grades = User::select('grade_level', DB::raw('count(*) as count'))
            ->whereNotNull('grade_level')
            ->groupBy('grade_level')
            ->orderBy('grade_level')
            ->get();

        $totalStudents = User::count();
        
        $distribution = [];
        foreach ($grades as $grade) {
            $percentage = $totalStudents > 0 ? ($grade->count / $totalStudents) * 100 : 0;
            $distribution[] = [
                'grade' => $grade->grade_level,
                'count' => $grade->count,
                'percentage' => round($percentage),
            ];
        }

        return $distribution;
    }

    /**
     * Get top 3 performing students
     */
    private function getTopPerformers($students)
    {
        $performances = [];

        foreach ($students as $student) {
            $completed = $student->trackings->where('status', 'completed');
            
            if ($completed->isEmpty()) {
                continue;
            }

            $average = round(
                $completed->avg(function ($track) {
                    if (!$track->lesson || $track->lesson->total_scores == 0) {
                        return 0;
                    }
                    return ($track->score / $track->lesson->total_scores) * 100;
                }),
                1
            );

            $performances[] = [
                'id' => $student->id,
                'name' => $student->name,
                'average' => $average,
                'completed_lessons' => $completed->count(),
            ];
        }

        // Sort by average (descending) and take top 3
        usort($performances, function ($a, $b) {
            return $b['average'] <=> $a['average'];
        });

        return array_slice($performances, 0, 3);
    }

    /**
     * Generate recent alerts based on student performance
     */
    private function getRecentAlerts($students)
    {
        $alerts = [];

        // Students with low performance (< 60%)
        $strugglingCount = 0;
        foreach ($students as $student) {
            $completed = $student->trackings->where('status', 'completed');
            if ($completed->isEmpty()) continue;

            $average = round(
                $completed->avg(function ($track) {
                    if (!$track->lesson || $track->lesson->total_scores == 0) {
                        return 0;
                    }
                    return ($track->score / $track->lesson->total_scores) * 100;
                })
            );

            if ($average < 60) {
                $strugglingCount++;
            }
        }

        if ($strugglingCount > 0) {
            $alerts[] = [
                'message' => "{$strugglingCount} student" . ($strugglingCount > 1 ? 's are' : ' is') . " performing below 60%",
                'timestamp' => Carbon::now()->subHours(2)->format('d M g:i A'),
                'type' => 'warning'
            ];
        }

        // Students who haven't logged in for 7+ days
        $inactiveCount = User::where('last_login_at', '<', Carbon::now()->subDays(7))
            ->orWhereNull('last_login_at')
            ->count();

        if ($inactiveCount > 0) {
            $alerts[] = [
                'message' => "{$inactiveCount} student" . ($inactiveCount > 1 ? 's have' : ' has') . " not logged in for over a week",
                'timestamp' => Carbon::now()->subHours(5)->format('d M g:i A'),
                'type' => 'info'
            ];
        }

        // Students stuck on same lesson for 7+ days
        $stuckStudents = UserTrack::where('status', 'in_progress')
            ->where('updated_at', '<', Carbon::now()->subDays(7))
            ->distinct('user_id')
            ->count('user_id');

        if ($stuckStudents > 0) {
            $alerts[] = [
                'message' => "{$stuckStudents} student" . ($stuckStudents > 1 ? 's are' : ' is') . " stuck on the same lesson for over a week",
                'timestamp' => Carbon::now()->subDays(1)->format('d M g:i A'),
                'type' => 'alert'
            ];
        }

        return array_slice($alerts, 0, 3); // Limit to 3 most recent
    }
}
