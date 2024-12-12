<?php

use App\Http\Controllers\AnnouncementController;
use App\Models\Announcement;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Auth;

Route::post('/student_signup', [UserController::class, 'storeStudent'])->name('student_signup');

Route::post('/teacher_signup', [UserController::class, 'storeTeacher'])->name('teacher_signup');

Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');

Route::post('/login', [UserController::class, 'login'])->name('login');

Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/start2', [UserController::class, 'show'])->name('start2');

Route::get('/dashboard', function() {
    $user = Auth::user();
    return view('dashboard', [ 'name' => $user->name, 'position' => $user->role ]);
})->name('dashboard')->middleware('auth');

Route::get('/', function () {
    return view('start2');
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
    $user = Auth::user();
    $announcements = App\Models\Announcement::all();
    return view('announcements', [ 'name' => $user->name, 'position' => $user->role, 'announcements' => $announcements ]);
})->middleware('auth');

Route::get('/announcements2', function () {
    $user = Auth::user();
    return view('announcements2', [ 'name' => $user->name, 'position' => $user->role ]);
})->middleware('auth');

Route::get('/announcements3', function () {
    $user = Auth::user();
    return view('announcements3', [ 'name' => $user->name, 'position' => $user->role ]);
})->middleware('auth');

Route::post('/announcements', [AnnouncementController::class, 'store'])->middleware('auth')->name('announcements.store');

Route::get('/tasks', function () {
    $user = Auth::user();
    return view('tasks', [ 'name' => $user->name, 'position' => $user->role ]);
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
    $user = Auth::user();
    return view('availability', [ 'name' => $user->name, 'position' => $user->role ]);
})->middleware('auth');

Route::get('/dashboard/profile', [UserController::class, 'showProfile'])->middleware('auth')->name('user.profile');
