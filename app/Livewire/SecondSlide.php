<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class SecondSlide extends Component
{
    public $lesson;
    public $page = 1;
    public $totalPages;

    // Audio configuration - easy to manage!
    private $audioMap = [
        1 => [ // Lesson 1
            1 => 'audio/lesson1/L1P1.m4a',
            2 => 'audio/lesson1/L1P2.m4a',
        ],
        2 => [ // Lesson 2
            1 => 'audio/lesson2/L2P1.m4a',
            2 => 'audio/lesson2/L2P2.m4a',
            3 => 'audio/lesson2/L2P3.m4a',
            4 => 'audio/lesson2/L2P4.m4a',
            5 => 'audio/lesson2/L2P5.m4a',
            6 => 'audio/lesson2/L2P6.m4a',
            7 => 'audio/lesson2/L2P7.m4a',
            8 => 'audio/lesson2/L2P8.m4a',
            9 => 'audio/lesson2/L2P9.m4a',
            10 => 'audio/lesson2/L2P10.m4a',

            11 => 'audio/lesson2/L2P11.m4a',
            12 => 'audio/lesson2/L2P12.m4a',
            13 => 'audio/lesson2/L2P13.m4a',
            14 => 'audio/lesson2/L2P14.m4a',
            15 => 'audio/lesson2/L2P15.m4a',
            16 => 'audio/lesson2/L2P16.m4a',
            17 => 'audio/lesson2/L2P17.m4a',
            18 => 'audio/lesson2/L2P18.m4a',
        ],
        3 => [ // Lesson 3
            1 => 'audio/lesson3/L3P1.m4a',
            2 => 'audio/lesson3/L3P2.m4a',
            3 => 'audio/lesson3/L3P3.m4a',
            4 => 'audio/lesson3/L3P4.m4a',
        ],
        4 => [ // Lesson 4
            1 => 'audio/lesson4/L4P1.m4a',
            2 => 'audio/lesson4/L4P2.m4a',
            3 => 'audio/lesson4/L4P3.m4a',
            4 => 'audio/lesson4/L4P4.m4a',
            5 => 'audio/lesson4/L4P5.m4a',
            6 => 'audio/lesson4/L4P6.m4a',
            7 => 'audio/lesson4/L4P7.m4a',
            8 => 'audio/lesson4/L4P8.m4a',
            9 => 'audio/lesson4/L4P9.m4a',
            10 => 'audio/lesson4/L4P10.m4a',

            11 => 'audio/L4P1.m4a',
        ],
        5 => [ // Lesson 5
            1 => 'audio/Lesson5/L5P1.m4a',
            2 => 'audio/Lesson5/L5P2.m4a',
            3 => 'audio/Lesson5/L5P3.m4a',
        ],
        6 => [ // Lesson 6
            1 => 'audio/lesson6/L6P1.m4a',
            2 => ['audio/lesson6/L6P2.m4a', 'audio/lesson6/L6P3.m4a'],
            3 => 'audio/lesson6/L6P4.m4a',
            4 => 'audio/lesson6/L6P5.m4a',
            5 => 'audio/lesson6/L6P6.m4a',
            6 => 'audio/lesson6/L6P7.m4a',
            7 => 'audio/lesson6/L6P8.m4a',
            8 => 'audio/lesson6/L6P9.m4a',
        ],
        7 => [ // Lesson 7
            1 => ['audio/lesson7/L7P1.m4a', 'audio/lesson7/L7P2.m4a', 'audio/lesson7/L7P3.m4a'],
            2 => 'audio/lesson7/L7P4.m4a',
            3 => 'audio/lesson7/L7P5.m4a',
            4 => 'audio/lesson7/L7P6.m4a',
            5 => 'audio/lesson7/L7P7.m4a',
            6 => 'audio/lesson7/L7P8.m4a',
            7 => 'audio/lesson7/L7P9.m4a',
            8 => 'audio/lesson7/L7P10.m4a',
            9 => 'audio/lesson7/L7P11.m4a',
            10 => 'audio/lesson7/L7P12.m4a',

            11 => 'audio/lesson7/L7P13.m4a',
            12 => 'audio/lesson7/L7P14.m4a',
            13 => 'audio/lesson7/L7P15.m4a',
            14 => ['audio/lesson7/L7P16.m4a', 'audio/lesson7/L7P17.m4a'],
            15 => 'audio/lesson7/L7P18.m4a',
            16 => ['audio/lesson7/L7P19.m4a', 'audio/lesson7/L7P20.m4a'],
            17 => 'audio/lesson7/L7P21.m4a',
            18 => 'audio/lesson7/L7P22.m4a',
            19 => 'audio/lesson7/L7P23.m4a',
            20 => 'audio/lesson7/L7P24.m4a',

            21 => 'audio/lesson7/L7P25.m4a',
            22 => 'audio/lesson7/L7P26.m4a',
            23 => 'audio/lesson7/L7P27.m4a',
            24 => 'audio/lesson7/L7P28.m4a',
            25 => 'audio/lesson7/L7P29.m4a',
            26 => 'audio/lesson7/L7P30.m4a',
            27 => 'audio/lesson7/L7P31.m4a',
            28 => 'audio/lesson7/L7P32.m4a',
            29 => 'audio/lesson7/L7P33.m4a',
            30 => 'audio/lesson7/L7P34.m4a',

            31 => 'audio/lesson7/L7P35.m4a',
            32 => 'audio/lesson7/L7P36.m4a',
            33 => 'audio/lesson7/L7P37.m4a',
        ],
        8 => [ // Lesson 8
            1 => 'audio/lesson8/L8P1.m4a',
            2 => 'audio/lesson8/L8P2.m4a',
            3 => 'audio/lesson8/L8P3.m4a',
            4 => ['audio/lesson8/L8P4.m4a', 'audio/lesson8/L8P5.m4a', 'audio/lesson8/L8P6.m4a', 'audio/lesson8/L8P7.m4a'],
        ],
        9 => [ // Lesson 9
            1 => 'audio/lesson9/L9P1.m4a',
            2 => 'audio/lesson9/L9P2.m4a',
            3 => 'audio/lesson9/L9P3.m4a',
            4 => 'audio/lesson9/L9P4.m4a',
            5 => 'audio/lesson9/L9P5.m4a',
            6 => 'audio/lesson9/L9P6.m4a',
            7 => 'audio/lesson9/L9P7.m4a',
            8 => 'audio/lesson9/L9P8.m4a',
            9 => ['audio/lesson9/L9P9.m4a', 'audio/lesson9/L9P10.m4a'],
            10 => 'audio/lesson9/L9P11.m4a',

            11 => ['audio/lesson9/L9P12.m4a', 'audio/lesson9/L9P13.m4a', 'audio/lesson9/L9P14.m4a'],
            12 => ['audio/lesson9/L9P15.m4a', 'audio/lesson9/L9P16.m4a'],
            13 => ['audio/lesson9/L9P17.m4a', 'audio/lesson9/L9P18.m4a', 'audio/lesson9/L9P19.m4a'],
            14 => ['audio/lesson9/L9P20.m4a', 'audio/lesson9/L9P21.m4a', 'audio/lesson9/L9P22.m4a'],
            15 => ['audio/lesson9/L9P23.m4a', 'audio/lesson9/L9P24.m4a', 'audio/lesson9/L9P25.m4a'],
            16 => ['audio/lesson9/L9P26.m4a', 'audio/lesson9/L9P27.m4a'],
            17 => ['audio/lesson9/L9P28.m4a', 'audio/lesson9/L9P29.m4a'],
            18 => ['audio/lesson9/L9P30.m4a', 'audio/lesson9/L9P31.m4a'],
            19 => 'audio/lesson9/L9P32.m4a',
            20 => ['audio/lesson9/L9P33.m4a', 'audio/lesson9/L9P34.m4a'],
            21 => ['audio/lesson9/L9P35.m4a', 'audio/lesson9/L9P36.m4a'],
            22 => ['audio/lesson9/L9P37.m4a', 'audio/lesson9/L9P38.m4a'],
            23 => ['audio/lesson9/L9P39.m4a', 'audio/lesson9/L9P40.m4a', 'audio/lesson9/L9P41.m4a'],
        ],
        10 => [ // Lesson 10
            1 => ['audio/lesson10/L10P1.m4a', 'audio/lesson10/L10P2.m4a']
            
        ],
        11 => [ // Lesson 11
            1 => ['audio/lesson11/L11P1.m4a', 'audio/lesson11/L11P2.m4a', 'audio/lesson11/L11P3.m4a'],
            2 => 'audio/L11P2.m4a',
            3 => 'audio/L11P3.m4a',
            
        ],
        12 => [ // Lesson 12
            1 => 'audio/L12P1.m4a',
            2 => 'audio/L12P2.m4a',
        ],
        13 => [ // Lesson 13
            1 => 'audio/L13P1.m4a',
            2 => 'audio/L13P2.m4a',
        ],
        14 => [ // Lesson 14
            1 => 'audio/L14P1.m4a',
            2 => 'audio/L14P2.m4a',
            3 => 'audio/L14P3.m4a',
        ],
        15 => [ // Lesson 15
            1 => 'audio/L15P1.m4a',
            2 => 'audio/L15P2.m4a',
            3 => 'audio/L15P3.m4a',
            4 => 'audio/L15P4.m4a',
            5 => 'audio/L15P5.m4a',
            6 => 'audio/L15P6.m4a',
            7 => 'audio/L15P7.m4a',
            8 => 'audio/L15P8.m4a',
            9 => 'audio/L15P9.m4a',
            10 => 'audio/L15P10.m4a',

            11 => 'audio/L15P11.m4a',
            12 => 'audio/L15P12.m4a',
            13 => 'audio/L15P13.m4a',
            14 => 'audio/L15P14.m4a',
        ],
        16 => [ // Lesson 16
            1 => 'audio/L16P1.m4a',
            2 => 'audio/L16P2.m4a',
            3 => 'audio/L16P3.m4a',
            4 => 'audio/L16P4.m4a',
            5 => 'audio/L16P5.m4a',
            6 => 'audio/L16P6.m4a',
            7 => 'audio/L16P7.m4a',
            8 => 'audio/L16P8.m4a',
        ],
        17 => [ // Lesson 17
            1 => 'audio/L17P1.m4a',
            2 => 'audio/L17P2.m4a',
            3 => 'audio/L17P3.m4a',
            4 => 'audio/L17P4.m4a',
            5 => 'audio/L17P5.m4a',
            6 => 'audio/L17P6.m4a',
            7 => 'audio/L17P7.m4a',
            8 => 'audio/L17P8.m4a',
            9 => 'audio/L17P9.m4a',
            10 => 'audio/L17P10.m4a',

            11 => 'audio/L17P11.m4a',
            12 => 'audio/L17P12.m4a',
            13 => 'audio/L17P13.m4a',
            14 => 'audio/L17P14.m4a',
            15 => 'audio/L17P15.m4a',
        ],
        18 => [ // Lesson 18
            1 => 'audio/L18P1.m4a',
            2 => 'audio/L18P2.m4a',
            3 => 'audio/L18P3.m4a',
            4 => 'audio/L18P4.m4a',
            5 => 'audio/L18P5.m4a',
            6 => 'audio/L18P6.m4a',
            7 => 'audio/L18P7.m4a',
            8 => 'audio/L18P8.m4a',
            9 => 'audio/L18P9.m4a',
            10 => 'audio/L18P10.m4a',

            11 => 'audio/L18P11.m4a',
            12 => 'audio/L18P12.m4a',
            13 => 'audio/L18P13.m4a',
        ],

        19 => [ // Lesson 19
            1 => 'audio/L19P1.m4a',
            2 => 'audio/L19P2.m4a',
            3 => 'audio/L19P3.m4a',
            4 => 'audio/L19P4.m4a',
            5 => 'audio/L19P5.m4a',
            6 => 'audio/L19P6.m4a',
            7 => 'audio/L19P7.m4a',
            8 => 'audio/L19P8.m4a',
            9 => 'audio/L19P9.m4a',
            10 => 'audio/L19P10.m4a',

            11 => 'audio/L19P11.m4a',
            12 => 'audio/L19P12.m4a',
            13 => 'audio/L19P13.m4a',
            14 => 'audio/L19P14.m4a',
            15 => 'audio/L19P15.m4a',
            16 => 'audio/L19P16.m4a',
            17 => 'audio/L19P17.m4a',
        ],

        20 => [ // Lesson 20
            1 => 'audio/L20P1.m4a',
            2 => 'audio/L20P2.m4a',
            3 => 'audio/L20P3.m4a',
            4 => 'audio/L20P4.m4a',
            5 => 'audio/L20P5.m4a',
            6 => 'audio/L20P6.m4a',
            7 => 'audio/L20P7.m4a',
            8 => 'audio/L20P8.m4a',
            9 => 'audio/L20P9.m4a',
            10 => 'audio/L20P10.m4a',

            11 => 'audio/L20P11.m4a',
            12 => 'audio/L20P12.m4a',
            13 => 'audio/L20P13.m4a',
            14 => 'audio/L20P14.m4a',
            15 => 'audio/L20P15.m4a',
            16 => 'audio/L20P16.m4a',
            17 => 'audio/L20P17.m4a',
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
                    'current_progress' => 25, // Entered discussion slide
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
                    'current_progress' => 50, // Completed discussion slide
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
        return view('livewire.second-slide', [
            'audios' => $this->getAllAudios()
        ]);
    }
}