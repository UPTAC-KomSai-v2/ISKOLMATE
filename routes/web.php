<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('start');
});

Route::get('/start', function () {
    return view('start');
});

Route::get('/start2', function () {
    return view('start2');
});

Route::get('/signup', function () {
    return view('signup');
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

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/announcements', function () {
    return view('announcements');
});
Route::get('/announcements2', function () {
    return view('announcements2');
});
Route::get('/announcements3', function () {
    return view('announcements3');
});
Route::get('/tasks', function () {
    return view('tasks');
});

Route::get('/input_tasks', function () {
    return view('input_tasks');
});

Route::get('/input_tasks1', function () {
    return view('input_tasks1');
});

Route::get('/show_tasks', function () {
    return view('show_tasks');
});

Route::get('/availability', function () {
    return view('availability');
});

Route::get('/user_profile', function () {
    return view('user_profile');
});
