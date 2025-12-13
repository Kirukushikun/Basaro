<?php

namespace App\Livewire\Teacher;

use Livewire\Component;
use App\Models\Teacher;
use Exception;
use Illuminate\Support\Facades\Hash;

class TeacherManagement extends Component
{
    public $target;
    public $fullname, $username, $password, $role;
    public $search = '';

    protected $rules = [
        'fullname' => 'required|string|max:255',
        'username' => 'required|string|max:255|unique:teachers,email',
        'password' => 'required|string|min:6',
        'role' => 'required|in:teacher,admin',
    ];

    // Real-time search
    public function updatedSearch()
    {
        // This will automatically trigger re-render when search changes
    }

    // Load teacher data into form inputs
    public function targetID($id)
    {
        try {
            $this->target = $id;
            $teacher = Teacher::findOrFail($id);
            $this->fullname = $teacher->name;
            $this->username = $teacher->email;
            $this->role = $teacher->role;
        } catch (Exception $e) {
            $this->noreloadNotif('error', 'Error', 'Failed to load teacher data. Please try again.');
        }
    }

    // Create new teacher
    public function submit()
    {
        try {
            $this->validate();

            Teacher::create([
                'name' => $this->fullname,
                'email' => $this->username,
                'password' => Hash::make($this->password),
                'role' => $this->role,
                'is_disabled' => false, // Enable by default on creation
            ]);

            $this->clear();
            $this->reloadNotif('success', 'Success!', 'Teacher created successfully.');
            return redirect()->to(request()->header('Referer'));
        } catch (Exception $e) {
            $this->noreloadNotif('error', 'Error', 'Failed to create teacher. Please check your inputs and try again.');
        }
    }   

    // Update existing teacher
    public function update()
    {
        try {
            $teacher = Teacher::findOrFail($this->target);
            
            // Check if email has changed to determine validation rules
            $emailRule = $this->username !== $teacher->email 
                ? 'required|string|max:255|unique:teachers,email'
                : 'required|string|max:255';
            
            // Validate only the fields needed for update
            $this->validate([
                'fullname' => 'required|string|max:255',
                'username' => $emailRule,
                'role' => 'required|in:teacher,admin',
            ]);

            $updateData = [
                'name' => $this->fullname,
                'role' => $this->role,
            ];

            // Only update email if it has changed
            if ($this->username !== $teacher->email) {
                $updateData['email'] = $this->username;
            }

            $teacher->update($updateData);

            $this->clear();
            $this->reloadNotif('success', 'Success!', 'Teacher updated successfully.');
            return redirect()->to(request()->header('Referer'));
        } catch (Exception $e) {
            $this->noreloadNotif('error', 'Error', 'Failed to update teacher. Please check your inputs and try again.');
        }
    }

    // Reset teacher password
    public function resetPassword()
    {
        try {
            $this->validate([
                'password' => 'required|string|min:6',
            ]);

            $teacher = Teacher::findOrFail($this->target);
            $teacher->update([
                'password' => Hash::make($this->password),
            ]);

            $this->clear();
            $this->reloadNotif('success', 'Success!', 'Password reset successfully.');
            return redirect()->to(request()->header('Referer'));
        } catch (Exception $e) {
            $this->noreloadNotif('error', 'Error', 'Failed to reset password. Please try again.');
        }
    }

    // Delete teacher
    public function delete()
    {
        try {
            $teacher = Teacher::find($this->target);
            
            if (!$teacher) {
                $this->noreloadNotif('error', 'Error', 'Teacher not found.');
                return;
            }

            $teacher->delete();
            $this->clear();
            $this->reloadNotif('success', 'Success!', 'Teacher deleted successfully.');
            return redirect()->to(request()->header('Referer'));
        } catch (Exception $e) {
            $this->noreloadNotif('error', 'Error', 'Failed to delete teacher. Please try again.');
        }
    }

    // Toggle teacher status (enable/disable)
    public function toggleStatus($id)
    {
        try {
            $teacher = Teacher::findOrFail($id);
            $teacher->update([
                'is_disabled' => !$teacher->is_disabled
            ]);
            
            $status = $teacher->is_disabled ? 'disabled' : 'enabled';
            $this->reloadNotif('success', 'Success!', "Teacher {$status} successfully.");
            return redirect()->to(request()->header('Referer'));
        } catch (Exception $e) {
            $this->noreloadNotif('error', 'Error', 'Failed to update teacher status. Please try again.');
        }
    }

    // Reset form fields
    public function clear()
    {
        $this->reset(['fullname', 'username', 'password', 'role', 'target']);
    }

    public function render()
    {
        $teachers = Teacher::query()
            ->when($this->search, function($query) {
                $query->where(function($q) {
                    $q->where('name', 'like', '%' . $this->search . '%')
                      ->orWhere('email', 'like', '%' . $this->search . '%')
                      ->orWhere('id', 'like', '%' . $this->search . '%')
                      ->orWhere('role', 'like', '%' . $this->search . '%');
                });
            })
            ->latest()
            ->get();

        return view('livewire.teacher.teacher-management', [
            'teachers' => $teachers,
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