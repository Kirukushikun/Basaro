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