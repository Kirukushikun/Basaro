<?php

namespace App\Livewire;

use Livewire\Component;

class SecondSlide extends Component
{
    public $lesson;
    public $page = 1;

    public function mount($lesson){
        $this->lesson = $lesson;
    }

    public function render()
    {
        return view('livewire.second-slide');
    }
}
