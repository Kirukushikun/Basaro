<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    /* ======================
        USER REGISTER
    ====================== */
    public function register(Request $req)
    {
        $data = $req->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => ['required', 'confirmed', Password::min(8)],
        ]);

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        return redirect()->route('login');
    }

    /* ======================
        USER LOGIN
    ====================== */
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $req)
    {
        $credentials = $req->validate([
            'email' => 'required|email',
            'password' => 'required',
            'remember' => 'nullable|boolean',
        ]);

        if (!Auth::attempt($credentials, $credentials['remember'] ?? false)) {
            return back()->withErrors([
                'login' => 'Invalid email or password.',
            ]);
        }

        $req->session()->regenerate();

        Auth::user()->update([
            'last_login_at' => now(),
        ]);

        return redirect('/dashboard');
    }

    public function logout(Request $req)
    {
        Auth::logout();
        $req->session()->invalidate();
        $req->session()->regenerateToken();

        return redirect()->route('login');
    }

    /* ======================
        TEACHER LOGIN
    ====================== */
    public function showTeacherLogin()
    {
        return view('auth.login-teacher');
    }

    public function teacherLogin(Request $req)
    {
        $credentials = $req->validate([
            'email' => 'required|email',
            'password' => 'required',
            'remember' => 'nullable|boolean',
        ]);

        if (!Auth::guard('teacher')->attempt(
            $credentials,
            $credentials['remember'] ?? false
        )) {
            return back()->withErrors([
                'login' => 'Invalid email or password.',
            ]);
        }

        $req->session()->regenerate();

        return redirect('/teacher/dashboard');
    }

    public function teacherLogout(Request $req)
    {
        Auth::guard('teacher')->logout();
        $req->session()->invalidate();
        $req->session()->regenerateToken();

        return redirect()->route('teacher.login');
    }
}
