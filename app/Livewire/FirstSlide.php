<?php

namespace App\Livewire;

use Livewire\Component;

class FirstSlide extends Component
{   
    public $lesson;

    public $page = 1;

    public function mount($lesson){
        $this->lesson = $lesson;
        if($lesson != 1){
            $this->page = 2;
        }
    }
    public function render()
    {
        return view('livewire.first-slide');
    }
}
