<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    // public function showRegister() {
    //     return view('auth.register');
    // }

    public function register(Request $req) {
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

        // log the user in (store user id in session)
        session()->regenerate();
        session(['user_id' => $user->id]);

        return redirect()->intended(route('home'));
    }

    public function showLogin() {
        return view('auth.login');
    }

    public function login(Request $req)
    {
        $data = $req->validate([
            'email' => 'required|email',
            'password' => 'required',
            'remember' => 'nullable|boolean'
        ]);

        // Try to log in using Laravel Auth
        if (! Auth::attempt([
            'email' => $data['email'],
            'password' => $data['password']
        ], $data['remember'] ?? false)) {
            return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
        }

        // Regenerate session for security
        $req->session()->regenerate();

        return redirect()->intended('/dashboard');
    }

    public function logout(Request $req)
    {
        Auth::logout();                     // log out the user
        $req->session()->invalidate();      // destroy old session
        $req->session()->regenerateToken(); // new CSRF token

        return redirect()->route('login');
    }
}

