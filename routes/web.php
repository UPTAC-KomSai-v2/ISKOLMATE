<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Auth;

# the name method  assigns a name to the route and allows us to call it like {{ route('start2') }} in the login form HTML.
Route::post('/start2', [UserController::class, 'store'])->name('start2');

Route::get('/start2', [UserController::class, 'show'])->name('start2');

// for login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

Route::post('/login', [LoginController::class, 'login']);

Route::get('/dashboard', function() {
    $user = Auth::user();
    return view('dashboard', [ 'name' => $user->name, 'position' => $user->role ]);
})->name('dashboard')->middleware('auth');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/', function () {
    return view('start');
});

Route::get('/start', function () {
    return view('start');
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

Route::get('/announcements', function () {
    return view('announcements');
})->middleware('auth');

Route::get('/announcements2', function () {
    return view('announcements2');
})->middleware('auth');

Route::get('/announcements3', function () {
    return view('announcements3');
})->middleware('auth');

Route::get('/tasks', function () {
    return view('tasks');
})->middleware('auth');

Route::get('/input_tasks', function () {
    return view('input_tasks');
})->middleware('auth');

Route::get('/input_tasks1', function () {
    return view('input_tasks1');
})->middleware('auth');

Route::get('/show_tasks', function () {
    return view('show_tasks');
})->middleware('auth');

Route::get('/availability', function () {
    return view('availability');
})->middleware('auth');

Route::get('/user_profile', function () {
    return view('user_profile');
})->middleware('auth');
