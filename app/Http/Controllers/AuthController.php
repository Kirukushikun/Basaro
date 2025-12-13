<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    // public function showRegister() {
    //     return view('auth.register');
    // }

    public function register(Request $req)
    {
        try {
            $data = $req->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => ['required', 'confirmed', Password::min(8)],
            ]);

            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);

            session()->regenerate();

            return redirect()->intended(route('home'));
        } catch (\Throwable $e) {
            return back()
                ->withErrors(['register' => 'Something went wrong while creating your account.'])
                ->withInput();
        }
    }

    public function showLogin() {
        return view('auth.login');
    }

    public function login(Request $req)
    {
        try {
            $data = $req->validate([
                'email' => 'required',
                'password' => 'required',
                'remember' => 'nullable|boolean'
            ]);

            if (! Auth::attempt([
                'email' => $data['email'],
                'password' => $data['password']
            ], $data['remember'] ?? false)) {
                return back()
                    ->withErrors(['login' => 'Invalid email or password.'])
                    ->withInput();
            }

            $req->session()->regenerate();

            // Update last login timestamp
            Auth::user()->update([
                'last_login_at' => now()
            ]);

            return redirect()->intended('/dashboard');

        } catch (\Throwable $e) {
            return back()
                ->withErrors(['login' => 'An unexpected error occurred while logging in.'])
                ->withInput();
        }
    }

    public function logout(Request $req)
    {
        try {
            Auth::logout();
            $req->session()->invalidate();
            $req->session()->regenerateToken();

            return redirect()->route('login');

        } catch (\Throwable $e) {
            return back()->withErrors(['logout' => 'Failed to log out properly. Please try again.']);
        }
    }


    public function showTeacherLogin() {
        return view('auth.login-teacher');
    }

    public function teacherLogin(Request $req)
    {
        try {
            $data = $req->validate([
                'email' => 'required',
                'password' => 'required',
                'remember' => 'nullable|boolean'
            ]);

            if (! Auth::guard('teacher')->attempt([
                'email' => $data['email'],
                'password' => $data['password'],
            ], $data['remember'] ?? false)) {

                return back()
                    ->withErrors(['login' => 'Invalid email or password.'])
                    ->withInput();
            }

            $req->session()->regenerate();

            // Auth::guard('teacher')->user()->update([
            //     'last_login_at' => now()
            // ]);

            return redirect()->intended('/teacher/dashboard');

        } catch (\Throwable $e) {
            return back()
                ->withErrors(['login' => 'An unexpected error occurred while logging in.'])
                ->withInput();
        }
    }
}

