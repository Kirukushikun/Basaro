<?php

use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SpeechController;

Route::middleware('guest')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
    Route::get('/teacher/login', [AuthController::class, 'showTeacherLogin'])->name('teacher.login');
    Route::post('/teacher/login', [AuthController::class, 'teacherLogin'])->name('teacher.login.submit');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth.custom');
Route::post('/logout/teacher', [AuthController::class, 'teacherLogout'])->name('logout.teacher');

// ✅ MOVE THIS OUTSIDE - But still require auth
Route::middleware('auth.custom')->post('/api/speech-to-text', [SpeechController::class, 'transcribe'])
    ->name('speech.transcribe');


Route::get('/test-speech', function() {
    try {
        $service = new \App\Services\SpeechToTextService();
        return response()->json(['status' => 'Service initialized successfully']);
    } catch (\Exception $e) {
        return response()->json([
            'error' => $e->getMessage(),
            'trace' => $e->getTraceAsString()
        ], 500);
    }
});

Route::middleware('auth.custom')->group(function () {
    Route::get('/', function () {
        return redirect('/dashboard');
    });

    Route::get('/dashboard', function () {
        return view('student.dashboard');
    })->name('home');

    Route::get('/lessons', function () {
        return view('student.lessons');
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
});

Route::middleware('auth:teacher')->group(function () {
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