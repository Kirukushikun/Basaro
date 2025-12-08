<?php

namespace App\Livewire\Teacher;

use Livewire\Component;
use App\Models\User;
use Exception;

class StudentManagement extends Component
{
    public $target;
    public $fullname, $username, $password, $grade_level, $assigned_teacher;

    protected $rules = [
        'fullname' => 'required|string|max:255',
        'username' => 'required|string|max:255|unique:users,email',
        'password' => 'required|string|min:6',
        'grade_level' => 'required|string|max:50',
        'assigned_teacher' => 'nullable|string|max:255',
    ];

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
        try {
            $this->validate();

            User::create([
                'name' => $this->fullname,
                'email' => $this->username,
                'password' => bcrypt($this->password),
                'grade_level' => $this->grade_level,
                'teacher_id' => $this->assigned_teacher,
            ]);

            $this->clear();
            $this->reloadNotif('success', 'Success!', 'Student created successfully.');
            return redirect()->to(request()->header('Referer'));
        } catch (Exception $e) {
            $this->noreloadNotif('failed', 'Error', 'Failed to create student. Please check your inputs and try again.');
        }
    }   

    // Update existing user/student
    public function update()
    {
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
    }

    // Delete user/student
    public function delete()
    {
        try {
            $student = User::find($this->target);
            
            if (!$student) {
                $this->noreloadNotif('failed', 'Error', 'Student not found.');
                return;
            }

            $student->delete();
            $this->clear();
            $this->reloadNotif('success', 'Success!', 'Student deleted successfully.');
            return redirect()->to(request()->header('Referer'));
        } catch (Exception $e) {
            $this->noreloadNotif('failed', 'Error', 'Failed to delete student. Please try again.');
        }
    }

    // Reset form fields
    public function clear()
    {
        $this->reset(['fullname', 'username', 'password', 'grade_level', 'assigned_teacher', 'target']);
    }

    public function render()
    {
        return view('livewire.teacher.student-management', [
            'students' => User::latest()->get(),
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