<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::get('/dashboard', function () {
    return view('student.dashboard');
});

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