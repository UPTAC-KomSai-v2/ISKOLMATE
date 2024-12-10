<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::post('/start2', [UserController::class, 'store'])->name('start2'); # the name method  assigns a name to the route and allows us to call it like {{ route('start2') }} in the login form HTML.

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
