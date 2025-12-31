<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ThirdSlidePanuto extends Component
{
    public $lesson;
    public $page = 1;
    public $totalPages;

    // Audio configuration - matching SecondSlide structure
    private $audioMap = [
        1 => [ // Lesson 1
            1 => ['audio/lesson1/L1P3.m4a', 'audio/lesson1/L1P4.m4a'],
        ],
        2 => [ // Lesson 2
            1 => ['audio/lesson2/L2P19.m4a', 'audio/lesson2/L2P20.m4a','audio/lesson2/L2P21.m4a'],
        ],
        3 => [ // Lesson 3
            1 => 'audio/lesson3/L3P5.m4a',
        ],
        4 => [ // Lesson 4
            1 => 'audio/lesson4/L4P12.m4a',
        ],
        5 => [ // Lesson 5
            1 => ['audio/lesson5/L5P3.m4a', 'audio/lesson5/L5P4.m4a', 'audio/lesson5/L5P5.m4a'],
        ],
        6 => [ // Lesson 6
            1 => ['audio/lesson6/L6P10.m4a', 'audio/lesson6/L6P11.m4a', 'audio/lesson6/L6P12.m4a'],
        ],
        7 => [ // Lesson 7
            1 => ['audio/lesson7/L7P38.m4a', 'audio/lesson7/L7P39.m4a'],
        ],
        8 => [ // Lesson 8
            1 => ['audio/lesson8/L8P8.m4a', 'audio/lesson8/L8P9.m4a'],
        ],
        9 => [ // Lesson 9
            1 => ['audio/lesson9/L9P42.m4a', 'audio/lesson9/L9P43.m4a'],
        ],
        10 => [ // Lesson 10
            1 => 'audio/lesson10/L10P3.m4a',
        ],
        11 => [ // Lesson 11
            1 => ['audio/lesson11/L11P4.m4a', 'audio/lesson11/L11P5.m4a',],
        ],
        12 => [ // Lesson 12
            1 => 'audio/lesson12/L12P1.m4a',
        ],
        13 => [ // Lesson 13
            1 => ['audio/lesson13/L13P1.m4a', 'audio/lesson13/L13P2.m4a', 'audio/lesson13/L13P3.m4a'],
        ],
        14 => [ // Lesson 14
            1 => ['audio/lesson14/L14P1.m4a', 'audio/lesson14/L14P2.m4a', 'audio/lesson14/L14P3.m4a'],
        ],
        15 => [ // Lesson 15
            1 => ['audio/lesson15/L15P1.m4a', 'audio/lesson15/L15P2.m4a',],
        ],
        16 => [ // Lesson 16
            1 => ['audio/lesson16/L16P1.m4a', 'audio/lesson16/L16P2.m4a',],
        ],
        17 => [ // Lesson 17
            1 => ['audio/lesson17/L17P1.m4a', 'audio/lesson17/L17P2.m4a',],
        ],
        18 => [ // Lesson 18
            1 => ['audio/lesson18/L18P1.m4a', 'audio/lesson18/L18P2.m4a',],
        ],
        19 => [ // Lesson 19
            1 => ['audio/lesson19/L19P1.m4a', 'audio/lesson19/L19P2.m4a',],
        ],
        20 => [ // Lesson 20
            1 => ['audio/lesson20/L20P1.m4a', 'audio/lesson20/L20P2.m4a',],
        ],
    ];

    public function mount($lesson)
    {
        $this->lesson = $lesson;
        $this->totalPages = count($this->audioMap[$lesson] ?? []);
        
        $user = Auth::user();
        
        if ($user) {
            // Only update if this is NEW progress (greater than current)
            if ($user->current_lesson != $lesson || $user->current_progress < 25) {
                $user->update([
                    'current_lesson' => $lesson,
                    'current_progress' => 25, // Entered panuto slide
                ]);
            }
        }
    }

    public function completeLesson()
    {
        $user = Auth::user();
        
        if ($user) {
            // Only update if this is forward progress
            if ($user->current_progress < 50) {
                $user->update([
                    'current_progress' => 50, // Completed panuto slide
                ]);
            }
        }
    }

    public function getAudioForCurrentPage()
    {
        return $this->audioMap[$this->lesson][$this->page] ?? null;
    }

    public function getAllAudios()
    {
        return $this->audioMap[$this->lesson] ?? [];
    }

    public function render()
    {
        return view('livewire.third-slide-panuto', [
            'audios' => $this->getAllAudios()
        ]);
    }
}