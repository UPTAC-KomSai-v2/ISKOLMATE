<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\User;

class UserController extends Controller
{
    public function show()
    {
        return view('entry.choice');
    }

    public function showProfile(Request $request)
    {
        $user = $request->user();

        return view('dashboard.user.profile', [
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'position' => $user->role,
            'program' => $user->affiliation,
            'is_teacher' => $user->is_teacher(),
            'courses' => $user->get_courses()
        ]);
    }

    public function storeStudent(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'student_id' => 'required|numeric|digits:9|unique:users,id',
            'password' => 'required|string|min:8',
            'affiliation' => 'required|string|max:255',
        ]);

        $user = new User;

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->id = $request->student_id;
        $user->password = $request->password;
        $user->affiliation = $request->affiliation;
        $user->role = 'Student';

        $user->save();
        return redirect()->route('choice');
    }

    public function storeTeacher(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'instructor_id' => 'required|numeric|digits:9|unique:users,id',
            'password' => 'required|string|min:8',
            'affiliation' => 'required|string|max:255',
        ]);

        $user = new User;

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->id = $request->instructor_id;
        $user->password = $request->password;
        $user->affiliation = $request->affiliation;
        $user->role = 'Teacher';

        $user->save();
        return redirect()->route('choice');
    }

    public function showLoginForm()
    {
        return view('entry.login.choice');
    }

    public function login(Request $request)
    {
        $request->validate([
            'uid' => 'required|string',
            'password' => 'required|string',
            'role' => 'required|string|in:Student,Teacher',
        ]);

        if (Auth::attempt([
            'id' => $request->uid, 
            'password' => $request->password,
            'role' => $request->role
        ])) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return redirect()->route('login')->withErrors([
            'uid' => 'The provided credentials or role do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
