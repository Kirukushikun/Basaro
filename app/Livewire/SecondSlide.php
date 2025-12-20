<?php

namespace App\Livewire;

use Livewire\Component;

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
            3 => 'audio/lesson1/L1P3.m4a',
        ],
        2 => [ // Lesson 2
            1 => 'audio/L2P1.m4a',
            2 => 'audio/L2P2.m4a',
            3 => 'audio/L2P3.m4a',
            4 => 'audio/L2P4.m4a',
            5 => 'audio/L2P5.m4a',
            6 => 'audio/L2P6.m4a',
            7 => 'audio/L2P7.m4a',
            8 => 'audio/L2P8.m4a',
            9 => 'audio/L2P9.m4a',
            10 => 'audio/L2P10.m4a',

            11 => 'audio/L2P1.m4a',
            12 => 'audio/L2P2.m4a',
            13 => 'audio/L2P3.m4a',
            14 => 'audio/L2P4.m4a',
            15 => 'audio/L2P5.m4a',
            16 => 'audio/L2P6.m4a',
            17 => 'audio/L2P7.m4a',
        ],
        3 => [ // Lesson 3
            1 => 'audio/L3P1.m4a',
            2 => 'audio/L3P2.m4a',
            3 => 'audio/L3P3.m4a',
            4 => 'audio/L3P4.m4a',
        ],
        4 => [ // Lesson 4
            1 => 'audio/L4P1.m4a',
            2 => 'audio/L4P2.m4a',
            3 => 'audio/L4P3.m4a',
            4 => 'audio/L4P4.m4a',
            5 => 'audio/L4P5.m4a',
            6 => 'audio/L4P6.m4a',
            7 => 'audio/L4P7.m4a',
            8 => 'audio/L4P8.m4a',
            9 => 'audio/L4P9.m4a',
            10 => 'audio/L4P10.m4a',

            11 => 'audio/L4P1.m4a',
            12 => 'audio/L4P2.m4a',
        ],
        5 => [ // Lesson 5
            1 => 'audio/L5P1.m4a',
            2 => 'audio/L5P2.m4a',
        ],
        6 => [ // Lesson 6
            1 => 'audio/L6P1.m4a',
            2 => 'audio/L6P2.m4a',
            3 => 'audio/L6P3.m4a',
            4 => 'audio/L6P4.m4a',
            5 => 'audio/L6P5.m4a',
            6 => 'audio/L6P6.m4a',
            7 => 'audio/L6P7.m4a',
            8 => 'audio/L6P8.m4a',
            9 => 'audio/L6P9.m4a',
            10 => 'audio/L6P10.m4a',

            11 => 'audio/L6P1.m4a',
            12 => 'audio/L6P2.m4a',
            13 => 'audio/L6P3.m4a',
            14 => 'audio/L6P4.m4a',
            15 => 'audio/L6P5.m4a',
            16 => 'audio/L6P6.m4a',
            17 => 'audio/L6P7.m4a',
            18 => 'audio/L6P7.m4a',
        ],
        7 => [ // Lesson 7
            1 => 'audio/L7P1.m4a',
            2 => 'audio/L7P2.m4a',
            3 => 'audio/L7P3.m4a',
            4 => 'audio/L7P4.m4a',
            5 => 'audio/L7P5.m4a',
            6 => 'audio/L7P6.m4a',
            7 => 'audio/L7P7.m4a',
            8 => 'audio/L7P8.m4a',
            9 => 'audio/L7P9.m4a',
            10 => 'audio/L7P10.m4a',

            11 => 'audio/L7P11.m4a',
            12 => 'audio/L7P12.m4a',
            13 => 'audio/L7P13.m4a',
            14 => 'audio/L7P14.m4a',
            15 => 'audio/L7P15.m4a',
            16 => 'audio/L7P16.m4a',
            17 => 'audio/L7P17.m4a',
            18 => 'audio/L7P18.m4a',
            19 => 'audio/L7P19.m4a',
            20 => 'audio/L7P20.m4a',

            21 => 'audio/L7P21.m4a',
            22 => 'audio/L7P22.m4a',
            23 => 'audio/L7P23.m4a',
            24 => 'audio/L7P24.m4a',
            25 => 'audio/L7P25.m4a',
            26 => 'audio/L7P26.m4a',
            27 => 'audio/L7P27.m4a',
            28 => 'audio/L7P28.m4a',
            29 => 'audio/L7P29.m4a',
            30 => 'audio/L7P30.m4a',

            31 => 'audio/L7P31.m4a',
            32 => 'audio/L7P32.m4a',
            33 => 'audio/L7P33.m4a',
            34 => 'audio/L7P34.m4a',
            35 => 'audio/L7P35.m4a',
            36 => 'audio/L7P36.m4a',
            37 => 'audio/L7P37.m4a',
            38 => 'audio/L7P38.m4a',
            39 => 'audio/L7P39.m4a',
            40 => 'audio/L7P40.m4a',

            41 => 'audio/L7P41.m4a',
            42 => 'audio/L7P42.m4a',
            43 => 'audio/L7P43.m4a',
            44 => 'audio/L7P44.m4a',
            45 => 'audio/L7P45.m4a',
            46 => 'audio/L7P46.m4a',
            47 => 'audio/L7P47.m4a',
            48 => 'audio/L7P48.m4a',
            49 => 'audio/L7P49.m4a',
            
        ],
        8 => [ // Lesson 8
            1 => 'audio/L8P1.m4a',
            2 => 'audio/L8P2.m4a',
            3 => 'audio/L8P3.m4a',
            4 => 'audio/L8P4.m4a',
            5 => 'audio/L8P5.m4a',
            6 => 'audio/L8P6.m4a',
            7 => 'audio/L8P7.m4a',
            8 => 'audio/L8P8.m4a',
            9 => 'audio/L8P9.m4a',
            10 => 'audio/L8P10.m4a',
        ],
        9 => [ // Lesson 9
            1 => 'audio/L9P1.m4a',
            2 => 'audio/L9P2.m4a',
            3 => 'audio/L9P3.m4a',
            4 => 'audio/L9P4.m4a',
            5 => 'audio/L9P5.m4a',
            6 => 'audio/L9P6.m4a',
            7 => 'audio/L9P7.m4a',
            8 => 'audio/L9P8.m4a',
            9 => 'audio/L9P9.m4a',
            10 => 'audio/L9P10.m4a',

            11 => 'audio/L9P11.m4a',
            12 => 'audio/L9P12.m4a',
            13 => 'audio/L9P13.m4a',
            14 => 'audio/L9P14.m4a',
            15 => 'audio/L9P15.m4a',
            16 => 'audio/L9P16.m4a',
            17 => 'audio/L9P17.m4a',
            18 => 'audio/L9P18.m4a',
            19 => 'audio/L9P19.m4a',
            20 => 'audio/L9P20.m4a',

            21 => 'audio/L9P21.m4a',
            22 => 'audio/L9P22.m4a',
            23 => 'audio/L9P23.m4a',
            24 => 'audio/L9P24.m4a',
            25 => 'audio/L9P25.m4a',
            26 => 'audio/L9P26.m4a',
            27 => 'audio/L9P27.m4a',
            28 => 'audio/L9P28.m4a',
            29 => 'audio/L9P29.m4a',
            30 => 'audio/L9P30.m4a',

            31 => 'audio/L9P31.m4a',
            32 => 'audio/L9P32.m4a',
            33 => 'audio/L9P33.m4a',
            34 => 'audio/L9P34.m4a',
            35 => 'audio/L9P35.m4a',
            36 => 'audio/L9P36.m4a',
        ],
        10 => [ // Lesson 10
            1 => 'audio/L10P1.m4a',
            2 => 'audio/L10P2.m4a',
            3 => 'audio/L10P3.m4a',
            
        ],
        11 => [ // Lesson 11
            1 => 'audio/L11P1.m4a',
            2 => 'audio/L11P2.m4a',
            3 => 'audio/L11P3.m4a',
            4 => 'audio/L11P5.m4a',
            5 => 'audio/L11P5.m4a',
            
        ],
        12 => [ // Lesson 12
            1 => 'audio/L12P1.m4a',
            2 => 'audio/L12P2.m4a',
            3 => 'audio/L12P3.m4a',
        ],
        13 => [ // Lesson 13
            1 => 'audio/L13P1.m4a',
            2 => 'audio/L13P2.m4a',
            3 => 'audio/L13P3.m4a',
            4 => 'audio/L13P4.m4a',
        ],
        14 => [ // Lesson 14
            1 => 'audio/L14P1.m4a',
            2 => 'audio/L14P2.m4a',
            3 => 'audio/L14P3.m4a',
            4 => 'audio/L14P4.m4a',
            5 => 'audio/L14P5.m4a',
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
            15 => 'audio/L15P15.m4a',
            16 => 'audio/L15P16.m4a',
            17 => 'audio/L15P17.m4a',
            18 => 'audio/L15P18.m4a',
            19 => 'audio/L15P19.m4a',
            20 => 'audio/L15P20.m4a',

            21 => 'audio/L15P21.m4a',
            22 => 'audio/L15P22.m4a',
            23 => 'audio/L15P23.m4a',
            24 => 'audio/L15P24.m4a',
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
            9 => 'audio/L16P9.m4a',
            10 => 'audio/L16P10.m4a',

            11 => 'audio/L16P11.m4a',
            12 => 'audio/L16P12.m4a',
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
    ];

    public function mount($lesson)
    {
        $this->lesson = $lesson;
        $this->totalPages = count($this->audioMap[$lesson] ?? []);
    }

    public function getAudioForCurrentPage()
    {
        return $this->audioMap[$this->lesson][$this->page] ?? null;
    }

    // Simple page navigation
    public function nextPage()
    {
        if ($this->page < $this->totalPages) {
            $this->page++;
            $this->updateUserProgress(); // Just update current_progress, NOT UserTrack
        }
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