<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('start2');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/choices', function () {
    return view('choices');
});

Route::get('/student_signup', function () {
    return view('student_signup');
});

Route::get('/teacher_signup', function () {
    return view('teacher_signup');
});