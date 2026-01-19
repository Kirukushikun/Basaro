<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Teacher;
use App\Models\Lesson;
use App\Models\UserTrack;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $user = User::create([
            'name' => 'Iverson Guno',
            'email' => 'i.guno@bfcgroup.org',
            'password' => Hash::make('Brookside2025'),
        ]);

        User::create([
            'name' => 'Ishi Robles',
            'email' => 'i.robles@gmail.com',
            'password' => Hash::make('Kaytobilang'),
        ]);

        User::create([
            'name' => 'Juan Dela Cruz',
            'email' => 'j.dela_cruz@bfcgroup.org',
            'password' => Hash::make('password123'),
        ]);

        Teacher::create([
            'name' => 'Iverson Guno',
            'email' => 'i.guno@bfcgroup.org',
            'password' => Hash::make('Brookside2025'),
        ]);

        Teacher::create([
            'name' => 'Elvie Ramos',
            'email' => 'e.ramos@email.com',
            'password' => Hash::make('password123'),
        ]);

        $lessonTitles = [
            'Ang Alpabetong Filipino',
            'Ang Mga Patinig',
            'Pantulong na Kataga',
            'Pagsasama-sama ng mga tunog (M, S, A)',
            'Pagbuo ng mga Parirala at Pangungusap',

            'M, S, A, I, O at B',
            'E, U, T, K, L, Y at N',
            'Pag-unawa sa Binasang Pangungusap',
            'Pagbasa ng mga Pantig',
            'Pagbasa ng mga Pangunahing Salita',

            'Pagpapalawak ng mga Bokabularyo',
            'Diptonggo',
            'Kambal Katinig',
            'Panlapi',
            'Pag-unawa sa Binasang Karunungang-bayan',

            'Pag-unawa sa Binasang Tula',
            'Pag-unawa sa Binasang Maikling Kuwento',
            'Pag-unawa sa Binasang Balita',
            'Pag-unawa sa Binasang Editoryal',
            'Pag-unawa sa Binasang Artikulong Pang-agham at Teknolohiya',
        ];

        $lessonDescriptions = [
            'Ang Alpabetong Filipino' => 'Pagkilala sa mga letra ng alpabetong Filipino at tamang pagbasa ng mga ito.',
            'Ang Mga Patinig' => 'Pagkilala at tamang pagbigkas ng limang patinig.',
            'Pantulong na Kataga' => 'Pagkilala sa mga pantulong na kataga na ginagamit sa pangungusap.',
            'Pagsasama-sama ng mga tunog (M, S, A)' => 'Pagsasanay sa pagsasanib ng mga tunog upang makabuo ng mga pantig.',
            'Pagbuo ng mga Parirala at Pangungusap' => 'Pagbuo at pag-unawa ng simpleng parirala at pangungusap.',

            'M, S, A, I, O at B' => 'Pagkilala at pagbigkas sa mga tunog ng mga letrang M, S, A, I, O at B.',
            'E, U, T, K, L, Y at N' => 'Pagkilala at pagbigkas sa mga tunog ng mga letrang E, U, T, K, L, Y at N.',
            'Pag-unawa sa Binasang Pangungusap' => 'Pagsasanay sa pag-unawa ng kahulugan ng mga binasang pangungusap.',
            'Pagbasa ng mga Pantig' => 'Pagsasanay sa pagbasa at pagbuo ng iba’t ibang uri ng pantig.',
            'Pagbasa ng mga Pangunahing Salita' => 'Pagkilala at pagbasa ng mga salitang karaniwang ginagamit.',

            'Pagpapalawak ng mga Bokabularyo' => 'Pagkilala sa bagong salita at wastong paggamit ng mga ito.',
            'Diptonggo' => 'Pagkilala at pagbigkas ng mga salitang may diptonggo.',
            'Kambal Katinig' => 'Pagkilala sa mga salitang may kambal katinig at tamang pagbigkas.',
            'Panlapi' => 'Pagkilala sa mga panlapi at pagbubuo ng salita gamit ang mga ito.',
            'Pag-unawa sa Binasang Karunungang-bayan' => 'Pagkilala at pag-unawa sa mensahe ng mga karunungang-bayan.',

            'Pag-unawa sa Binasang Tula' => 'Pagkilala sa mensahe at damdamin na ipinahahayag sa tula.',
            'Pag-unawa sa Binasang Maikling Kuwento' => 'Pagkilala sa tauhan, lugar, at pangyayari sa isang maikling kuwento.',
            'Pag-unawa sa Binasang Balita' => 'Pag-unawa sa mahahalagang detalye ng isang balita.',
            'Pag-unawa sa Binasang Editoryal' => 'Pagkilala sa opinyon at layunin ng isang editoryal.',
            'Pag-unawa sa Binasang Artikulong Pang-agham at Teknolohiya' => 'Pag-unawa sa mga konsepto at impormasyon sa artikulong pang-agham at teknolohiya.',
        ];

        $lessonScores = [
            'Ang Alpabetong Filipino' => 10,
            'Ang Mga Patinig' => 10,
            'Pantulong na Kataga' => 10,
            'Pagsasama-sama ng mga tunog (M, S, A)' => 10,
            'Pagbuo ng mga Parirala at Pangungusap' => 10,

            'M, S, A, I, O at B' => 10,
            'E, U, T, K, L, Y at N' => 10,
            'Pag-unawa sa Binasang Pangungusap' => 10,
            'Pagbasa ng mga Pantig' => 10,
            'Pagbasa ng mga Pangunahing Salita' => 10,

            'Pagpapalawak ng mga Bokabularyo' => 10,
            'Diptonggo' => 10,
            'Kambal Katinig' => 10,
            'Panlapi' => 10,
            'Pag-unawa sa Binasang Karunungang-bayan' => 10,

            'Pag-unawa sa Binasang Tula' => 10,
            'Pag-unawa sa Binasang Maikling Kuwento' => 10,
            'Pag-unawa sa Binasang Balita' => 10,
            'Pag-unawa sa Binasang Editoryal' => 10,
            'Pag-unawa sa Binasang Artikulong Pang-agham at Teknolohiya' => 10,
        ];

        foreach ($lessonTitles as $index => $lesson) {
            Lesson::create([
                'title' => $lesson,
                'description' => $lessonDescriptions[$lesson],
                'total_scores' => $lessonScores[$lesson],
                'order' => $index + 1,
                'type' => null,
            ]);
        }

        // // Create 10 random users with random lesson progress
        // for ($i = 1; $i <= 10; $i++) {

        //     $user = User::create([
        //         'name' => "Student {$i}",
        //         'email' => "student{$i}@test.com",
        //         'password' => Hash::make('password'),
        //         'grade_level' => rand(7, 10)
        //     ]);

        //     // Random current lesson (1–20)
        //     $currentLesson = rand(1, 20);

        //     // Seed lesson progress for this user
        //     $this->seedLessonProgress($user->id, $currentLesson);
        // }
    }

    public function seedLessonProgress($userId, $currentLesson)
    {
        $maxLesson = 22;

        if ($currentLesson > $maxLesson) {
            $currentLesson = $maxLesson;
        }

        for ($lessonId = 1; $lessonId <= $currentLesson; $lessonId++) {

            // Prevent duplicate
            $exists = UserTrack::where('user_id', $userId)
                ->where('lesson_id', $lessonId)
                ->exists();

            if ($exists) {
                continue;
            }

            $lesson = Lesson::find($lessonId);
            $maxScore = $lesson?->total_scores ?? 0;

            UserTrack::create([
                'user_id'   => $userId,
                'lesson_id' => $lessonId,
                'score'     => $lessonId < $currentLesson
                                ? rand(0, $maxScore)
                                : 0,
                'attempts'  => $lessonId < $currentLesson ? rand(1, 3) : 0,
                'status'    => $lessonId < $currentLesson ? 'completed' : 'in_progress',
            ]);
        }
    }
}
