<?php

namespace App\Livewire;

use App\Models\Lesson;
use App\Models\UserTrack;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class LessonsList extends Component
{
    public function render()
    {
        // LessonsList.php - render()
        $user = Auth::user();
        $lessons = Lesson::orderBy('order')->get(); // order by 'order', not 'id'!

        $userTracks = UserTrack::where('user_id', $user->id)
            ->get()
            ->keyBy('lesson_id');

        // Use current_lesson from users table — same as dashboard
        $currentUnlockedOrder = $user->current_lesson ?? 1;

        // Find highest PASSING completed lesson order (score > 70%)
        $passingLessons = $userTracks->filter(function($track) use ($lessons) {
            if ($track->status !== 'completed') {
                return false;
            }
            
            // Get the lesson to calculate passing score
            $lesson = $lessons->firstWhere('id', $track->lesson_id);
            if (!$lesson) {
                return false;
            }
            
            // Calculate if score is passing (>60%)
            $passingScore = $lesson->total_scores * 0.60;
            return $track->score > $passingScore;
        });

        if ($passingLessons->isNotEmpty()) {
            // Get the lesson IDs of passing tracks
            $passingLessonIds = $passingLessons->pluck('lesson_id');
            
            // Find the highest order among passing lessons
            $highestPassingLesson = $lessons->whereIn('id', $passingLessonIds)
                ->sortByDesc('order')
                ->first();
            
            if ($highestPassingLesson) {
                $currentUnlockedOrder = $highestPassingLesson->order + 1;
            }
        }

        return view('livewire.lessons-list', [
            'lessons' => $lessons,
            'userTracks' => $userTracks,
            'currentUnlockedOrder' => $currentUnlockedOrder,
        ]);
    }
}