<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Lesson;

class DashboardStudent extends Component
{
    public function render()
    {   
        $lesson = Lesson::findOrFail(Auth::user()->current_lesson);
        return view('livewire.dashboard-student', compact('lesson'));
    }
}
