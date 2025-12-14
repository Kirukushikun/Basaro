<?php

namespace App\Livewire\Teacher;

use App\Models\User;
use App\Models\Lesson;
use Livewire\Component;
use Livewire\WithPagination;

class PerformanceReport extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10;
    
    // For student detail modal
    public $selectedStudent = null;
    public $studentProgress = [];

    // Real-time search
    public function updatedSearch()
    {
        $this->resetPage();
    }

    // View student detailed progress
    public function viewStudentProgress($studentId)
    {
        $this->selectedStudent = User::with([
            'trackings' => function($query) {
                $query->with('lesson')->orderBy('lesson_id');
            }
        ])->find($studentId);

        if ($this->selectedStudent) {
            // Organize progress data
            $this->studentProgress = [
                'completed' => $this->selectedStudent->trackings->where('status', 'completed')->count(),
                'in_progress' => $this->selectedStudent->trackings->where('status', 'in_progress')->count(),
                'total_lessons' => Lesson::count(),
                'average_score' => $this->calculateAverageScore($this->selectedStudent),
                'lessons' => $this->selectedStudent->trackings->map(function($track) {
                    return [
                        'lesson_id' => $track->lesson_id,
                        'lesson_title' => $track->lesson->title ?? 'Lesson ' . $track->lesson_id,
                        'status' => $track->status,
                        'score' => $track->score,
                        'total_score' => $track->lesson->total_scores ?? 0,
                        'percentage' => $track->lesson && $track->lesson->total_scores > 0
                            ? round(($track->score / $track->lesson->total_scores) * 100, 1)
                            : 0,
                        'attempts' => $track->attempts,
                        'completed_at' => $track->status === 'completed' ? $track->updated_at->format('M d, Y') : null,
                    ];
                })
            ];
        }
    }

    // Close modal
    public function closeModal()
    {
        $this->selectedStudent = null;
        $this->studentProgress = [];
    }

    // Calculate average score for a student
    private function calculateAverageScore($student)
    {
        $completed = $student->trackings->where('status', 'completed');
        
        if ($completed->isEmpty()) {
            return 0;
        }

        return round(
            $completed->avg(function ($track) {
                if (!$track->lesson || $track->lesson->total_scores == 0) {
                    return 0;
                }
                return ($track->score / $track->lesson->total_scores) * 100;
            }),
            1
        );
    }

    // Calculate current lesson for a student
    private function getCurrentLesson($student)
    {
        return $student->trackings->max('lesson_id') ?? 0;
    }

    public function render()
    {
        $totalLessons = Lesson::count();

        $students = User::query()
            ->with([
                'trackings.lesson' => function($query) {
                    $query->select('id', 'title', 'total_scores');
                }
            ])
            ->when($this->search, function($query) {
                $query->where(function($q) {
                    $q->where('name', 'like', '%' . $this->search . '%')
                      ->orWhere('email', 'like', '%' . $this->search . '%')
                      ->orWhere('id', 'like', '%' . $this->search . '%')
                      ->orWhere('grade_level', 'like', '%' . $this->search . '%');
                });
            })
            ->latest()
            ->paginate($this->perPage);

        return view('livewire.teacher.performance-report', [
            'students' => $students,
            'totalLessons' => $totalLessons,
        ]);
    }
}