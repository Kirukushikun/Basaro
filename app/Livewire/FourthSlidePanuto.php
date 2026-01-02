<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class FourthSlidePanuto extends Component
{
    public $lesson;
    public $page = 1;
    public $totalPages;

    // Audio configuration - matching SecondSlide structure
    private $audioMap = [
        1 => [ // Lesson 1
            1 => 'audio/lesson1/L1P5.m4a',
        ],
        2 => [ // Lesson 2
            1 => 'audio/lesson2/L2P21.m4a',
        ],
        3 => [ // Lesson 3
            1 => 'audio/lesson3/L3P6.m4a',
        ],
        4 => [ // Lesson 4
            1 => ['audio/lesson4/L4P13.m4a', 'audio/lesson4/L4P14.m4a'],
        ],
        5 => [ // Lesson 5
            1 => ['audio/lesson5/L5P6.m4a', 'audio/lesson5/L5P7.m4a'],
        ],
        6 => [ // Lesson 6
            1 => ['audio/lesson6/L6P13.m4a', 'audio/lesson6/L6P14.m4a', 'audio/lesson6/L6P15.m4a', 'audio/lesson6/L6P16.m4a'],
        ],
        7 => [ // Lesson 7
            1 => ['audio/lesson7/L7P40.m4a', 'audio/lesson7/L7P41.m4a'],
        ],
        8 => [ // Lesson 8
            1 => ['audio/lesson8/L8P10.m4a', 'audio/lesson8/L8P11.m4a'],
        ],
        9 => [ // Lesson 9
            1 => 'audio/lesson9/L9P44.m4a',
        ],
        10 => [ // Lesson 10
            1 => 'audio/lesson10/L10P4.m4a',
        ],
        11 => [ // Lesson 11
            1 => 'audio/lesson11/L11P9.m4a',
        ],
        12 => [ // Lesson 12
            1 => ['audio/lesson12/L12P3.m4a', 'audio/lesson12/L12P4.m4a'],
        ],
        13 => [ // Lesson 13
            1 => ['audio/lesson13/L13P9.m4a', 'audio/lesson13/L13P10.m4a'],
        ],
        14 => [ // Lesson 14
            1 => 'audio/lesson14/L14P7.m4a',
        ],
        15 => [ // Lesson 15
            1 => ['audio/lesson15/L15P22.m4a', 'audio/lesson15/L15P23.m4a', 'audio/lesson15/L15P24.m4a'],
        ],
        16 => [ // Lesson 16
            1 => 'audio/lesson16/L16P13.m4a',
        ],
        17 => [ // Lesson 17
            1 => 'audio/lesson17/L17P11.m4a',
        ],
        18 => [ // Lesson 18
            1 => 'audio/lesson18/L18P9.m4a',
        ],
        19 => [ // Lesson 19
            1 => 'audio/lesson19/L19P10.m4a',
        ],
        20 => [ // Lesson 20
            1 => 'audio/lesson20/L20P8.m4a',
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
        return view('livewire.fourth-slide-panuto', [
            'audios' => $this->getAllAudios()
        ]);
    }
}
