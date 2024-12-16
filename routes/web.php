<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\TaskController;
use App\Models\Activity;
use App\Models\Announcement;
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
})->name('signup.choice');

Route::get('/student_signup', function () {
    return view('student_signup');
});

Route::get('/teacher_signup', function () {
    return view('teacher_signup');
});

Route::get('/dashboard/announcements', function () {
    $user = Auth::user();
    $announcements = Announcement::all();
    return view('announcements', [ 'name' => $user->name, 'position' => $user->role, 'announcements' => $announcements ]);
})->middleware('auth')->name('announcements.view');

Route::get('/dashboard/announcements/create', function () {
    $user = Auth::user();
    return view('announcements2', [ 'name' => $user->name, 'position' => $user->role ]);
})->middleware('auth')->name('announcements.create');

Route::get('/announcements3', function () {
    $user = Auth::user();
    return view('announcements3', [ 'name' => $user->name, 'position' => $user->role ]);
})->middleware('auth');

Route::post('/announcements', [AnnouncementController::class, 'store'])->middleware('auth')->name('announcements.store');

Route::delete('/announcements/{announcement}', [AnnouncementController::class, 'destroy'])->middleware('auth')->name('announcement.destroy');

Route::get('/dashboard/tasks', function () {
    $user = Auth::user();
    $tasks = Activity::all();

    $user_tasks = [];

    foreach ($tasks as $task) {
        if ($task->get_owner_id() == $user->id) {
            array_push($user_tasks, $task);
        }
    }

    return view('tasks', [ 'name' => $user->name, 'position' => $user->role, 'tasks' => $user_tasks]);
})->middleware('auth')->name('tasks.list');

Route::get('/dashboard/tasks/create', function () {
    return view('input_tasks');
    return view('tasks', [ 'title' => $task->title, 'description' => $task->description, 'deadline' => $task->deadline ]);
})->middleware('auth')->name('tasks.create');

Route::get('/dashboard/tasks/success', function () {
    return view('input_tasks1');
    return view('tasks', [ 'title' => $task->title, 'description' => $task->description, 'deadline' => $task->deadline ]);
})->middleware('auth')->name('tasks.message');

Route::get('/dashboard/tasks/{id}', function ($id) {
    $user = Auth::user();
    $task = Activity::find($id);

    if ($task->get_owner_id() != $user->id) {
        return redirect()->route('tasks.list');
    }

    return view('show_tasks', [ 'name' => $user->name, 'position' => $user->role, 'task' => $task ]);
})->middleware('auth')->name('tasks.show');

Route::post('/tasks/store', [TaskController::class, 'store'])->middleware('auth')->name('tasks.store');

Route::delete('/tasks/{id}', [TaskController::class, 'destroy'])->middleware('auth')->name('tasks.destroy');

Route::get('/dashboard/availability', function () {
    $user = Auth::user();
    return view('availability', [ 'name' => $user->name, 'position' => $user->role ]);
})->middleware('auth')->name('availability');

Route::get('/dashboard/profile', [UserController::class, 'showProfile'])->middleware('auth')->name('user.profile');

// Group routes
Route::post('/dashboard/groups/create', [GroupController::class, 'storeGroup'])->middleware('auth')->name('group.create');

Route::get('/dashboard/groups/create', function () {
    return view('groups.create');
})->middleware('auth');

Route::get('/dashboard/groups', [GroupController::class, 'viewGroups'])->middleware('auth')->name('group.view');

Route::get('/dashboard/groups/{group_id}', [GroupController::class, 'viewGroupMembers'])->middleware('auth')->name('group.members');

Route::post('/dashboard/groups/{group_id}', [GroupController::class, 'deleteGroups'])->middleware('auth')->name('group.delete');

Route::post('/dashboard/groups/{group_id}/include', [GroupController::class, 'includeUser'])->middleware('auth')->name('group.include');

Route::post('/dashboard/groups/{group_id}/exclude', [GroupController::class, 'excludeUser'])->middleware('auth')->name('group.exclude');
