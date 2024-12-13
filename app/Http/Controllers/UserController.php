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
        return view('start2');
    }

    public function showProfile(Request $request)
    {
        $user = $request->user();

        return view('user_profile', [
            'name' => $user->name,
            'position' => $user->role,
            'program' => $user->program,
            'is_teacher' => $user->is_teacher()
        ]);
    }

    public function storeStudent(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            // 'firstname' => 'required|string|max:255',
            // 'secondname' => 'required|string|max:255',
            // 'lastname' => 'required|string|max:255',
            'student_id' => 'required|numeric|digits:9|unique:users,id',
            'password' => 'required|string|min:8',
        ]);

        $user = new User;

        $user->name = $request->name;
        // $user->firstname = $request->firstname;
        // $user->secondname = $request->secondname;
        // $user->lastname = $request->lastname;
        $user->id = $request->student_id;
        $user->password = $request->password;
        $user->program = $request->program;
        $user->availability = 0;
        $user->role = 'Student';

        $user->save();

        return redirect()->route('start2');
    }

    public function storeTeacher(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            // 'firstname' => 'required|string|max:255',
            // 'secondname' => 'required|string|max:255',
            // 'lastname' => 'required|string|max:255',
            'instructor_id' => 'required|numeric|digits:9|unique:users,id',
            'password' => 'required|string|min:8',
        ]);

        $user = new User;

        $user->name = $request->name;
        // $user->firstname = $request->firstname;
        // $user->secondname = $request->secondname;
        // $user->lastname = $request->lastname;
        $user->id = $request->instructor_id;
        $user->password = $request->password;
        $user->program = $request->division;
        $user->availability = 0;
        $user->role = 'Teacher';

        $user->save();

        return redirect()->route('start2');
    }

    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'uid' => 'required|string',
            'password' => 'required|string'
        ]);

        if (Auth::attempt(['id' => $request->uid, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        return redirect()->route('login')->withErrors([
            'uid' => 'The provided credentials do not match our records.',
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
