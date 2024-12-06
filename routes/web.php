<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::post('/start2', [UserController::class, 'store'])->name('start2');

Route::get('/start2', [UserController::class, 'show'])->name('start2');

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

Route::get('/student_signup', function () {
    return view('student_signup');
});

Route::get('/teacher_signup', function () {
    return view('teacher_signup');
});


Route::get('/dashboard', function () {
    return view('dashboard');
});