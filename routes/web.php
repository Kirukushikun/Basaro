<?php

use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::middleware('guest')->group(function () {
    // Route::get('register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('register', [AuthController::class, 'register']);
    Route::get('login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('login', [AuthController::class, 'login']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth.custom');

Route::middleware('auth.custom')->group(function () {
    Route::get('/', function () {
        return redirect('/dashboard');
    });

    Route::get('/dashboard', function () {
        return view('student.dashboard');
    })->name('home');

    Route::get('/lessons', function () {
        $lessons = Lesson::orderBy('id', 'asc')->with('userTrack')->get();
        return view('student.lessons', compact('lessons'));
    });

    Route::get('/lesson-view', function (Request $request) {
        $lesson = $request->lesson;
        $slide = $request->slide;
        return view('student.lesson-view', compact('lesson', 'slide'));
    });

    Route::get('/achievements', function () {
        return view('student.achievements');
    });

    Route::get('/profile', function () {
        return view('student.profile');
    });

    Route::get('/teacher/dashboard', function () {
        return view('teacher.dashboard');
    });

    Route::get('/teacher/studentmanagement', function () {
        return view('teacher.studentmanagement');
    });

    Route::get('/teacher/teachermanagement', function () {
        return view('teacher.teachermanagement');
    });

    Route::get('/teacher/performancereport', function () {
        return view('teacher.performancereport');
    });

    Route::get('/teacher/settings', function () {
        return view('teacher.settings');
    });
});

