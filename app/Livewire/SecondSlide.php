<?php

namespace App\Livewire;

use Livewire\Component;

class SecondSlide extends Component
{
    public $lesson;

    public function mount($lesson){
        $this->lesson = $lesson;
    }

    public function render()
    {
        return view('livewire.second-slide');
    }
}
