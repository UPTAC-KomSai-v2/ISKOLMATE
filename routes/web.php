<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GroupController;
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
    return view('announcements', [ 'name' => $user->name, 'position' => $user->role ]);
})->middleware('auth');

Route::get('/announcements2', function () {
    $user = Auth::user();
    return view('announcements2', [ 'name' => $user->name, 'position' => $user->role ]);
})->middleware('auth');

Route::get('/announcements3', function () {
    $user = Auth::user();
    return view('announcements3', [ 'name' => $user->name, 'position' => $user->role ]);
})->middleware('auth');

Route::get('/tasks', function () {
    $user = Auth::user();
    return view('tasks', [ 'name' => $user->name, 'position' => $user->role ]);
})->middleware('auth');

Route::get('/input_tasks', function () {
    return view('input_tasks');
    return view('tasks', [ 'title' => $task->title, 'description' => $task->description, 'deadline' => $task->deadline ]);
})->middleware('auth');

Route::get('/input_tasks1', function () {
    return view('input_tasks1');
    return view('tasks', [ 'title' => $task->title, 'description' => $task->description, 'deadline' => $task->deadline ]);
})->middleware('auth');

Route::get('/show_tasks', function () {
    return view('show_tasks');
})->middleware('auth');

Route::get('/availability', function () {
    $user = Auth::user();
    return view('availability', [ 'name' => $user->name, 'position' => $user->role ]);
})->middleware('auth');

Route::get('/user_profile', function () {
    return view('user_profile');
})->middleware('auth');

// Group routes
Route::post('/dashboard/groups/create', [GroupController::class, 'storeGroup'])->middleware('auth')->name('group.create');

Route::get('/dashboard/groups/create', function () {
    return view('groups.create');
})->middleware('auth');

Route::get('/dashboard/groups', [GroupController::class, 'viewGroups'])->middleware('auth')->name('group.view');

Route::get('/dashboard/profile', [UserController::class, 'showProfile'])->middleware('auth')->name('user.profile');

Route::get('/dashboard/groups/{group_id}', [GroupController::class, 'viewGroupMembers'])->middleware('auth')->name('group.members');

Route::post('/dashboard/groups/{group_id}', [GroupController::class, 'deleteGroups'])->middleware('auth')->name('group.delete');

Route::post('/dashboard/groups/{group_id}/include', [GroupController::class, 'includeUser'])->middleware('auth')->name('group.include');

Route::post('/dashboard/groups/{group_id}/exclude', [GroupController::class, 'excludeUser'])->middleware('auth')->name('group.exclude');
