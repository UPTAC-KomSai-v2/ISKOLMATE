<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\TaskController;
use App\Models\Activity;
use App\Models\Announcement;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\AvailabilityController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('start');
});

Route::get('/start', function () {
    return view('start');
});

Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');

Route::post('/login', [UserController::class, 'login'])->name('login');

Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/start2', [UserController::class, 'show'])->name('start2');

Route::get('/signup', function () {
    return view('choices');
})->name('signup.choice');

Route::get('/student_signup', function () {
    return view('student_signup');
})->name('signup.student');

Route::get('/teacher_signup', function () {
    return view('teacher_signup');
})->name('signup.teacher');

Route::post('/student_signup', [UserController::class, 'storeStudent'])->name('signup.student');

Route::post('/teacher_signup', [UserController::class, 'storeTeacher'])->name('signup.teacher');

Route::get('/dashboard', function() {
    $user = Auth::user();
    return view('dashboard', [ 'first_name' => $user->first_name, 'last_name' => $user->last_name, 'position' => $user->role ]);
})->name('dashboard')->middleware('auth');

Route::post('/dashboard/availability', [AvailabilityController::class, 'storeAvailability'])->middleware('auth')->name('availability.store');

Route::post('/dashboard/search-availability', [AvailabilityController::class, 'searchAvailability'])->middleware('auth')->name('availability.search');

Route::delete('/dashboard/delete-availability/{id}', [AvailabilityController::class, 'destroy'])->middleware('auth')->name('availability.destroy');

Route::get('/dashboard/announcements', function () {
    $user = Auth::user();
    $announcements = Announcement::all();
    return view('announcements.view', [ 'first_name' => $user->first_name, 'last_name' => $user->last_name, 'position' => $user->role, 'announcements' => $announcements ]);
})->middleware('auth')->name('announcements.view');

Route::get('/dashboard/announcements/create', function () {
    $user = Auth::user();
    return view('announcements.create', [ 'name' => $user->name, 'position' => $user->role ]);
})->middleware('auth')->name('announcements.create');

Route::post('/dashboard/announcements', [AnnouncementController::class, 'store'])->middleware('auth')->name('announcements.store');

Route::delete('/dashboard/announcements/{announcement}', [AnnouncementController::class, 'destroy'])->middleware('auth')->name('announcement.destroy');

Route::get('/dashboard/tasks', function () {
    $user = Auth::user();
    $tasks = Activity::all();

    $user_tasks = [];

    foreach ($tasks as $task) {
        if ($task->get_owner_id() == $user->id) {
            array_push($user_tasks, $task);
        }
    }

    return view('tasks.view', [ 'first_name' => $user->first_name, 'last_name' => $user->last_name, 'position' => $user->role, 'tasks' => $user_tasks]);
})->middleware('auth')->name('tasks.list');

Route::get('/dashboard/tasks/create', function () {
    return view('tasks.create');
})->middleware('auth')->name('tasks.create');

Route::get('/dashboard/tasks/success', function () {
    return view('tasks.success');
})->middleware('auth')->name('tasks.message');

Route::get('/dashboard/tasks/{id}', function ($id) {
    $user = Auth::user();
    $task = Activity::find($id);

    if (!$task) {
        return redirect()->route('tasks.list');
    }

    if ($task->get_owner_id() != $user->id) {
        return redirect()->route('tasks.list');
    }

    return view('tasks.details', [ 'name' => $user->name, 'position' => $user->role, 'task' => $task ]);
})->middleware('auth')->name('tasks.show');

Route::post('/dashboard/tasks/store', [TaskController::class, 'store'])->middleware('auth')->name('tasks.store');

Route::delete('/dashboard/tasks/{id}', [TaskController::class, 'destroy'])->middleware('auth')->name('tasks.destroy');

Route::get('/dashboard/availability', function () {
    $user = Auth::user();
    $personalAvailabilities = \App\Models\Availability::where('user_id', $user->id)->get();
    return view('availability', [ 'first_name' => $user->first_name, 'last_name' => $user->last_name, 'position' => $user->role , 'personal_availabilities' => $personalAvailabilities]);
})->middleware('auth')->name('availability');

Route::get('/dashboard/profile', [UserController::class, 'showProfile'])->middleware('auth')->name('user.profile');

// Course routes
Route::post('/dashboard/courses/create', [CourseController::class, 'storeGroup'])->middleware('auth')->name('group.create');

Route::get('/dashboard/courses/create', [CourseController::class, 'viewCreate'])->middleware('auth')->name('group.create');

Route::get('/dashboard/courses', [CourseController::class, 'viewGroups'])->middleware('auth')->name('group.view');

Route::get('/dashboard/courses/{group_id}', [CourseController::class, 'viewGroupMembers'])->middleware('auth')->name('group.members');

Route::post('/dashboard/courses/{group_id}', [CourseController::class, 'deleteGroups'])->middleware('auth')->name('group.delete');

Route::post('/dashboard/courses/{group_id}/include', [CourseController::class, 'includeUser'])->middleware('auth')->name('group.include');

Route::post('/dashboard/courses/{group_id}/exclude', [CourseController::class, 'excludeUser'])->middleware('auth')->name('group.exclude');
