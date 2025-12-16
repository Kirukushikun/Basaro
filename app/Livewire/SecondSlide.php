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
            1 => 'audio/L1P1.m4a',
            2 => 'audio/L1P2.m4a',
            // Add more pages as needed
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
            3 => 'audio/L5P3.m4a',
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

            11 => 'audio/L6P11.m4a',
            12 => 'audio/L6P12.m4a',
            13 => 'audio/L6P13.m4a',
            14 => 'audio/L6P14.m4a',
            15 => 'audio/L6P15.m4a',
            16 => 'audio/L6P16.m4a',
            17 => 'audio/L6P17.m4a',
            18 => 'audio/L6P18.m4a',
            19 => 'audio/L6P19.m4a',
            20 => 'audio/L6P20.m4a',

            21 => 'audio/L6P21.m4a',
            22 => 'audio/L6P22.m4a',
            23 => 'audio/L6P23.m4a',
            24 => 'audio/L6P24.m4a',
            25 => 'audio/L6P25.m4a',
            26 => 'audio/L6P26.m4a',
            27 => 'audio/L6P27.m4a',
            28 => 'audio/L6P28.m4a',
            29 => 'audio/L6P29.m4a',
            30 => 'audio/L6P30.m4a',

            31 => 'audio/L6P31.m4a',
            32 => 'audio/L6P32.m4a',
            33 => 'audio/L6P33.m4a',
            34 => 'audio/L6P34.m4a',
            35 => 'audio/L6P35.m4a',
            36 => 'audio/L6P36.m4a',
            37 => 'audio/L6P37.m4a',
            38 => 'audio/L6P38.m4a',
            39 => 'audio/L6P39.m4a',
            40 => 'audio/L6P40.m4a',

            41 => 'audio/L6P41.m4a',
            42 => 'audio/L6P42.m4a',
            43 => 'audio/L6P43.m4a',
            44 => 'audio/L6P44.m4a',
            45 => 'audio/L6P45.m4a',
            46 => 'audio/L6P46.m4a',
            47 => 'audio/L6P47.m4a',
            48 => 'audio/L6P48.m4a',
            49 => 'audio/L6P49.m4a',
            
        ],
        // Add all 20 lessons
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