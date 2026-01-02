<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class ProfileSettings extends Component
{

    // Profile Information
    public $fullname;
    public $username; // This represents the email column but treated as string

    // Password Update
    public $current_password;
    public $new_password;
    public $new_password_confirmation;

    // Loading states
    public $isUpdatingProfile = false;
    public $isUpdatingPassword = false;

    public function mount()
    {
        $user = Auth::user();
        $this->fullname = $user->name;
        $this->username = $user->email; // Load email into username field
    }

    // Update Profile Information
    public function updateProfile()
    {
        if ($this->isUpdatingProfile) {
            return;
        }

        $this->isUpdatingProfile = true;

        try {
            $user = Auth::user();

            // Check if email has changed to determine validation rules
            $usernameRule = $this->username !== $user->email 
                ? 'required|string|max:255|unique:users,email,' . $user->id
                : 'required|string|max:255';

            $this->validate([
                'fullname' => 'required|string|max:255',
                'username' => $usernameRule,
            ]);

            $updateData = [
                'name' => $this->fullname,
            ];

            if ($this->username !== $user->email) {
                $updateData['email'] = $this->username; // Update email column
            }

            $user->update($updateData);

            $this->dispatch('notif', type: 'success', header: 'Success!', message: 'Profile updated successfully.');
            $this->dispatch('close-modal');
        } catch (ValidationException $e) {
            throw $e;
        } catch (Exception $e) {
            $this->dispatch('notif', type: 'error', header: 'Error', message: 'Failed to update profile. Please try again.');
        } finally {
            $this->isUpdatingProfile = false;
        }
    }

    // Update Password
    public function updatePassword()
    {
        if ($this->isUpdatingPassword) {
            return;
        }

        $this->isUpdatingPassword = true;

        try {
            $this->validate([
                'current_password' => 'required',
                'new_password' => ['required', 'min:6', 'confirmed'],
                'new_password_confirmation' => 'required',
            ]);

            $user = Auth::user();

            // Verify current password
            if (!Hash::check($this->current_password, $user->password)) {
                $this->isUpdatingPassword = false;
                $this->addError('current_password', 'The current password is incorrect.');
                return;
            }

            // Check if new password is different from current
            if (Hash::check($this->new_password, $user->password)) {
                $this->isUpdatingPassword = false;
                $this->addError('new_password', 'New password must be different from current password.');
                return;
            }

            $user->update([
                'password' => Hash::make($this->new_password),
            ]);

            // Clear password fields
            $this->reset(['current_password', 'new_password', 'new_password_confirmation']);
            
            $this->dispatch('notif', type: 'success', header: 'Success!', message: 'Password updated successfully.');
            $this->dispatch('close-modal');
        } catch (ValidationException $e) {
            throw $e;
        } catch (Exception $e) {
            $this->dispatch('notif', type: 'error', header: 'Error', message: 'Failed to update password. Please try again.');
        } finally {
            $this->isUpdatingPassword = false;
        }
    }

    public function render()
    {
        return view('livewire.profile-settings');
    }
}
