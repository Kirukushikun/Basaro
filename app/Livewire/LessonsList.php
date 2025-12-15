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

    $currentUnlockedId = 1; // default first lesson unlocked

    // Find highest completed lesson id
    $completedLessons = $userTracks->filter(fn($track) => $track->status === 'completed');

    if ($completedLessons->isNotEmpty()) {
        $highestCompleted = $completedLessons->sortByDesc('lesson_id')->first();
        $currentUnlockedId = $highestCompleted->lesson_id + 1;
    }

    return view('livewire.lessons-list', [
        'lessons' => $lessons,
        'userTracks' => $userTracks,
        'currentUnlockedId' => $currentUnlockedId,
    ]);
}

}
