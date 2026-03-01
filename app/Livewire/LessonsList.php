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
        $user = Auth::user();

        $lessons = Lesson::orderBy('id')->get();

        $userTracks = UserTrack::where('user_id', $user->id)
            ->get()
            ->keyBy('lesson_id');

        $currentUnlockedOrder = 1; // default first lesson unlocked

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