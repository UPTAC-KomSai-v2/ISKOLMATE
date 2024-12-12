<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function show()
    {
        return view('start2');
    }

    public function storeStudent(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            // 'firstname' => 'required|string|max:255',
            // 'secondname' => 'required|string|max:255',
            // 'lastname' => 'required|string|max:255',
            'student_number' => 'required|numeric|digits:9|unique:users,id',
            'password' => 'required|string|min:8',
        ]);

        $user = new User;

        $user->name = $request->name;
        // $user->firstname = $request->firstname;
        // $user->secondname = $request->secondname;
        // $user->lastname = $request->lastname;
        $user->id = $request->student_number;
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
        $user->program = $request->program;
        $user->availability = 0;
        $user->role = 'Student';

        $user->save();

        return redirect()->route('start2');
    }
}
