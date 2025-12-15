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
            3 => 'audio/L1P3.m4a',
            // Add more pages as needed
        ],
        2 => [ // Lesson 2
            1 => 'audio/L2P1.m4a',
            2 => 'audio/L2P2.m4a',
            // etc...
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