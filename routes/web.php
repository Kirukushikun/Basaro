<?php

use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('student.dashboard');
});

Route::get('/lessons', function () {
    return view('student.lessons');
});

Route::get('/lesson-view/{slide}', function ($slide) {
    return view('student.lesson-view', compact('slide'));
});