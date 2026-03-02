<?php

namespace App\Livewire\Teacher;

use Livewire\Component;
use App\Models\User;
use App\Models\Teacher;
use Exception;
use Illuminate\Support\Facades\Hash;
use Livewire\WithPagination;

class StudentManagement extends Component
{

    use WithPagination;

    public $target;
    public $fullname, $username, $password, $grade_level, $assigned_teacher;
    public $search = '';
    
    // Loading states for double-click prevention
    public $isSubmitting = false;
    public $isUpdating = false;
    public $isDeleting = false;
    public $isResetting = false;

    protected $rules = [
        'fullname' => 'required|string|max:255',
        'username' => 'required|string|max:255|unique:users,email',
        'password' => 'required|string|min:6',
        'grade_level' => 'required|string|max:50',
        'assigned_teacher' => 'nullable|string|max:255',
    ];

    protected $paginationTheme = 'tailwind';

    public function goToPage($page)
    {
       $this->setPage($page);
    }

    // Real-time search
    public function updatedSearch()
    {
        // This will automatically trigger re-render when search changes
    }

    // Load student data into form inputs
    public function targetID($id)
    {
        try {
            $this->target = $id;
            $student = User::findOrFail($id);
            $this->fullname = $student->name;
            $this->username = $student->email;
            $this->grade_level = $student->grade_level;
            $this->assigned_teacher = $student->teacher_id;
        } catch (Exception $e) {
            $this->noreloadNotif('failed', 'Error', 'Failed to load student data. Please try again.');
        }
    }

    // Create new user/student
    public function submit()
    {
        // Prevent double submission
        if ($this->isSubmitting) {
            return;
        }

        try {
            $this->isSubmitting = true;
            $this->validate();

            User::create([
                'name' => $this->fullname,
                'email' => $this->username,
                'password' => Hash::make($this->password),
                'grade_level' => $this->grade_level,
                'teacher_id' => $this->assigned_teacher,
            ]);

            $this->clear();
            $this->reloadNotif('success', 'Success!', 'Student created successfully.');
            return redirect()->to(request()->header('Referer'));
        } catch (Exception $e) {
            $this->isSubmitting = false;
            $this->noreloadNotif('failed', 'Error', 'Failed to create student. Please check your inputs and try again.');
        }
    }   

    // Update existing user/student
    public function update()
    {
        // Prevent double submission
        if ($this->isUpdating) {
            return;
        }

        try {
            $this->isUpdating = true;
            $student = User::findOrFail($this->target);
            
            // Check if email has changed to determine validation rules
            $emailRule = $this->username !== $student->email 
                ? 'required|string|max:255|unique:users,email'
                : 'required|string|max:255';
            
            // Validate only the fields needed for update
            $this->validate([
                'fullname' => 'required|string|max:255',
                'username' => $emailRule,
                'grade_level' => 'required|max:50',
                'assigned_teacher' => 'nullable|max:255',
            ]);

            $updateData = [
                'name' => $this->fullname,
                'grade_level' => $this->grade_level,
                'teacher_id' => $this->assigned_teacher,
            ];

            // Only update email if it has changed
            if ($this->username !== $student->email) {
                $updateData['email'] = $this->username;
            }

            $student->update($updateData);

            $this->clear();
            $this->reloadNotif('success', 'Success!', 'Student updated successfully.');
            return redirect()->to(request()->header('Referer'));
        } catch (Exception $e) {
            $this->isUpdating = false;
            $this->noreloadNotif('failed', 'Error', 'Failed to update student. Please try again.');
        }
    }

    // Reset student password
    public function resetPassword()
    {
        // Prevent double submission
        if ($this->isResetting) {
            return;
        }

        try {
            $this->isResetting = true;
            
            $this->validate([
                'password' => 'required|string|min:6',
            ]);

            $student = User::findOrFail($this->target);
            $student->update([
                'password' => Hash::make($this->password),
            ]);

            $this->clear();
            $this->reloadNotif('success', 'Success!', 'Password reset successfully.');
            return redirect()->to(request()->header('Referer'));
        } catch (Exception $e) {
            $this->isResetting = false;
            $this->noreloadNotif('failed', 'Error', 'Failed to reset password. Please try again.');
        }
    }

    // Delete user/student
    public function delete()
    {
        // Prevent double submission
        if ($this->isDeleting) {
            return;
        }

        try {
            $this->isDeleting = true;
            $student = User::find($this->target);
            
            if (!$student) {
                $this->isDeleting = false;
                $this->noreloadNotif('failed', 'Error', 'Student not found.');
                return;
            }

            $student->delete();
            $this->clear();
            $this->reloadNotif('success', 'Success!', 'Student deleted successfully.');
            return redirect()->to(request()->header('Referer'));
        } catch (Exception $e) {
            $this->isDeleting = false;
            $this->noreloadNotif('failed', 'Error', 'Failed to delete student. Please try again.');
        }
    }

    // Reset form fields
    public function clear()
    {
        $this->reset(['fullname', 'username', 'password', 'grade_level', 'assigned_teacher', 'target', 'isSubmitting', 'isUpdating', 'isDeleting', 'isResetting']);
    }

    public function render()
    {
        $students = User::query()
            ->when($this->search, function($query) {
                $query->where(function($q) {
                    $q->where('name', 'like', '%' . $this->search . '%')
                      ->orWhere('email', 'like', '%' . $this->search . '%')
                      ->orWhere('id', 'like', '%' . $this->search . '%')
                      ->orWhere('grade_level', 'like', '%' . $this->search . '%');
                });
            })
            ->latest()
            ->paginate(8);

        $teachers = Teacher::where('is_disabled', false)->get();

        return view('livewire.teacher.student-management', [
            'students' => $students,
            'teachers' => $teachers
        ]);
    }

    private function noreloadNotif($type, $header, $message)
    {
        $this->dispatch('notif', type: $type, header: $header, message: $message);
    }

    private function reloadNotif($type, $header, $message)
    {
        session()->flash('notif', [
            'type' => $type,
            'header' => $header,
            'message' => $message
        ]);
    }
}