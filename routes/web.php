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

// Entry routes
Route::get('/', function () {
    return view('entry.loading');
})
    ->middleware('entry')
    ->name('root');

Route::get('/choice', [UserController::class, 'show'])
    ->middleware('entry')
    ->name('choice');

Route::get('/login', [UserController::class, 'showLoginForm'])
    ->middleware('entry')
    ->name('login');

Route::get('/login/student', [UserController::class, 'showStudentLoginForm'])
    ->middleware('entry')
    ->name('login.student');

Route::get('/login/teacher', [UserController::class, 'showTeacherLoginForm'])
    ->middleware('entry')
    ->name('login.teacher');

Route::post('/login/student', [UserController::class, 'loginStudent'])
    ->middleware('entry')
    ->name('login.student');

Route::post('/login/teacher', [UserController::class, 'loginTeacher'])
    ->middleware('entry')
    ->name('login.teacher');

Route::get('/signup', [UserController::class, 'showSignupForm'])
    ->middleware('entry')
    ->name('signup.choice');

Route::get('/signup/student', [UserController::class, 'showStudentSignupForm'])
    ->middleware('entry')
    ->name('signup.student');

Route::get('/signup/teacher', [UserController::class, 'showTeacherSignupForm'])
    ->middleware('entry')
    ->name('signup.teacher');

Route::post('/signup/student', [UserController::class, 'storeStudent'])
    ->middleware('entry')
    ->name('signup.student');

Route::post('/signup/teacher', [UserController::class, 'storeTeacher'])
    ->middleware('entry')
    ->name('signup.teacher');

// Dashboard Routes
Route::get('/dashboard', function() {
    $user = Auth::user();
    return view('dashboard.main', [ 'first_name' => $user->first_name, 'last_name' => $user->last_name, 'position' => $user->role ]);
})
    ->middleware('auth')
    ->name('dashboard');

Route::post('/dashboard/availability', [AvailabilityController::class, 'storeAvailability'])
    ->middleware('auth')
    ->name('availability.store');

Route::post('/dashboard/search-availability', [AvailabilityController::class, 'searchAvailability'])
    ->middleware('auth')
    ->name('availability.search');

Route::delete('/dashboard/delete-availability/{id}', [AvailabilityController::class, 'destroy'])
    ->middleware('auth')
    ->name('availability.destroy');

Route::get('/dashboard/announcements', [AnnouncementController::class, 'show'])
    ->middleware('auth')
    ->name('announcements.view');

Route::get('/dashboard/announcements/create', [AnnouncementController::class, 'showCreateForm'])
    ->middleware('auth')
    ->name('announcements.create');

Route::post('/dashboard/announcements', [AnnouncementController::class, 'store'])
    ->middleware('auth')
    ->name('announcements.store');

Route::delete('/dashboard/announcements/{announcement}', [AnnouncementController::class, 'destroy'])
    ->middleware('auth')
    ->name('announcement.destroy');

Route::get('/dashboard/tasks', [TaskController::class, 'show'])
    ->middleware('auth')
    ->name('tasks.list');

Route::get('/dashboard/tasks/create', [TaskController::class, 'showCreateForm'])
    ->middleware('auth')
    ->name('tasks.create');

Route::get('/dashboard/tasks/{id}', [TaskController::class, 'showTask'])
    ->middleware('auth')
    ->name('tasks.show');

Route::post('/dashboard/tasks/store', [TaskController::class, 'store'])
    ->middleware('auth')
    ->name('tasks.store');

Route::delete('/dashboard/tasks/{id}', [TaskController::class, 'destroy'])
    ->middleware('auth')
    ->name('tasks.destroy');

Route::get('/dashboard/availability', function () {
    $user = Auth::user();
    $personalAvailabilities = \App\Models\Availability::where('user_id', $user->id)->get();
    return view('dashboard.availability', [ 'first_name' => $user->first_name, 'last_name' => $user->last_name, 'position' => $user->role , 'personal_availabilities' => $personalAvailabilities]);
})
    ->middleware('auth')
    ->name('availability');

Route::get('/dashboard/profile', [UserController::class, 'showProfile'])
    ->middleware('auth')
    ->name('user.profile');

Route::get('/dashboard/profile/{user_id}', [UserController::class, 'showOtherProfile'])
    ->middleware('auth')
    ->name('user.profile.other');

Route::post('/dashboard/courses/create', [CourseController::class, 'storeGroup'])
    ->middleware('auth')
    ->name('group.create');

Route::get('/dashboard/courses/create', [CourseController::class, 'viewCreate'])
    ->middleware('auth')
    ->name('group.create');

Route::get('/dashboard/courses', [CourseController::class, 'viewGroups'])
    ->middleware('auth')
    ->name('group.view');

Route::get('/dashboard/courses/{group_id}', [CourseController::class, 'viewGroupMembers'])
    ->middleware('auth')
    ->name('group.members');

Route::post('/dashboard/courses/{group_id}', [CourseController::class, 'deleteGroups'])
    ->middleware('auth')
    ->name('group.delete');

Route::post('/dashboard/courses/{group_id}/include', [CourseController::class, 'includeUser'])
    ->middleware('auth')
    ->name('group.include');

Route::post('/dashboard/courses/{group_id}/exclude', [CourseController::class, 'excludeUser'])
    ->middleware('auth')
    ->name('group.exclude');

// Logout route
Route::get('/logout', [UserController::class, 'logout'])
    ->name('logout');
