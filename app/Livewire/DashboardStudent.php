<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Lesson;

class DashboardStudent extends Component
{
    public function render()
    {   
        $lesson = Lesson::where('order', auth()->user()->current_lesson)->first();
        return view('livewire.dashboard-student', compact('lesson'));
    }
}
