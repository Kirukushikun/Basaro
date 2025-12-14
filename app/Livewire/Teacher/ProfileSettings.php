<?php

namespace App\Livewire\Teacher;

use Livewire\Component;
use App\Models\Teacher;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class ProfileSettings extends Component
{
    // Profile Information
    public $fullname;
    public $username;

    // Password Update
    public $current_password;
    public $new_password;
    public $new_password_confirmation;

    // Loading states
    public $isUpdatingProfile = false;
    public $isUpdatingPassword = false;

    public function mount()
    {
        // Load current user data
        $teacher = Auth::user();
        $this->fullname = $teacher->name;
        $this->username = $teacher->email;
    }

    // Update Profile Information
    public function updateProfile()
    {
        // Prevent double submission
        if ($this->isUpdatingProfile) {
            return;
        }

        try {
            $this->isUpdatingProfile = true;
            $teacher = Auth::user();

            // Check if email has changed to determine validation rules
            $emailRule = $this->username !== $teacher->email 
                ? 'required|email|max:255|unique:teachers,email'
                : 'required|email|max:255';

            $this->validate([
                'fullname' => 'required|string|max:255',
                'username' => $emailRule,
            ]);

            $updateData = [
                'name' => $this->fullname,
            ];

            // Only update email if it has changed
            if ($this->username !== $teacher->email) {
                $updateData['email'] = $this->username;
            }

            $teacher->update($updateData);

            $this->isUpdatingProfile = false;
            $this->dispatch('notif', type: 'success', header: 'Success!', message: 'Profile updated successfully.');
            $this->dispatch('close-modal'); // Close modal after success
        } catch (Exception $e) {
            $this->isUpdatingProfile = false;
            $this->dispatch('notif', type: 'error', header: 'Error', message: 'Failed to update profile. Please try again.');
        }
    }

    // Update Password
    public function updatePassword()
    {
        // Prevent double submission
        if ($this->isUpdatingPassword) {
            return;
        }

        try {
            $this->isUpdatingPassword = true;

            $this->validate([
                'current_password' => 'required',
                'new_password' => ['required', 'min:6', 'confirmed'],
                'new_password_confirmation' => 'required',
            ]);

            $teacher = Auth::user();

            // Verify current password
            if (!Hash::check($this->current_password, $teacher->password)) {
                $this->isUpdatingPassword = false;
                $this->addError('current_password', 'The current password is incorrect.');
                return;
            }

            // Check if new password is different from current
            if (Hash::check($this->new_password, $teacher->password)) {
                $this->isUpdatingPassword = false;
                $this->addError('new_password', 'New password must be different from current password.');
                return;
            }

            // Update password
            $teacher->update([
                'password' => Hash::make($this->new_password),
            ]);

            // Clear password fields
            $this->reset(['current_password', 'new_password', 'new_password_confirmation']);
            
            $this->isUpdatingPassword = false;
            $this->dispatch('notif', type: 'success', header: 'Success!', message: 'Password updated successfully.');
            $this->dispatch('close-modal'); // Close modal after success
        } catch (Exception $e) {
            $this->isUpdatingPassword = false;
            $this->dispatch('notif', type: 'error', header: 'Error', message: 'Failed to update password. Please try again.');
        }
    }

    public function render()
    {
        return view('livewire.teacher.profile-settings');
    }
}