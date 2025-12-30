<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ThirdSlidePanuto extends Component
{
    public $lesson;
    public $page = 1;
    public $totalPages;

    // Audio configuration - easy to manage!
    protected $audioMap = [
        1 => 'audio/lesson1/L1P1.m4a',
        2 => 'audio/lesson2/L2P1.m4a',
        3 => 'audio/lesson3/L3P1.m4a',
        4 => 'audio/lesson4/L4P1.m4a',
        5 => 'audio/lesson5/L5P1.m4a',
        6 => 'audio/lesson6/L6P1.m4a',
        7 => ['audio/lesson7/L7P1.m4a', 'audio/lesson7/L7P2.m4a', 'audio/lesson7/L7P3.m4a'],
        8 => 'audio/lesson8/L8P1.m4a',
        9 => 'audio/lesson9/L9P1.m4a',
        10 => ['audio/lesson10/L10P1.m4a', 'audio/lesson10/L10P2.m4a'],
        11 => ['audio/lesson11/L11P1.m4a', 'audio/lesson11/L11P2.m4a', 'audio/lesson11/L11P3.m4a'],
        12 => 'audio/lesson12/L12P1.m4a',
        13 => 'audio/lesson13/L13P1.m4a',
        14 => 'audio/lesson14/L14P1.m4a',
        15 => 'audio/lesson15/L15P1.m4a',
        16 => 'audio/lesson16/L16P1.m4a',
        17 => 'audio/lesson17/L17P1.m4a',
        18 => 'audio/lesson18/L18P1.m4a',
        19 => 'audio/lesson19/L19P1.m4a',
        20 => 'audio/lesson20/L20P1.m4a',
    ];

    public function mount($lesson)
    {
        $this->lesson = $lesson;
        
        $user = Auth::user();
        
        if ($user) {
            if ($user->current_lesson != $lesson || $user->current_progress < 25) {
                $user->update([
                    'current_lesson' => $lesson,
                    'current_progress' => 25,
                ]);
            }
        }
    }

    public function completeLesson()
    {
        $user = Auth::user();
        
        if ($user && $user->current_progress < 50) {
            $user->update([
                'current_progress' => 50,
            ]);
        }
    }

    public function getAudioForCurrentLesson()
    {
        return $this->audioMap[$this->lesson] ?? null;
    }

    public function render()
    {
        return view('livewire.third-slide-panuto', [
            'audio' => $this->getAudioForCurrentLesson()
        ]);
    }
}