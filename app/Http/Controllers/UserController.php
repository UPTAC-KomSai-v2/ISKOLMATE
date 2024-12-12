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

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            //'firstname' => 'required|string|max:255',
            //'secondname' => 'required|string|max:255',
            //'lastname' => 'required|string|max:255',
            'uid' => 'required|numeric|digits:9|unique:users,uid',
            'password' => 'required|string|min:8',
        ]);

        $user = new User;

        $user->name = $request->name;
        //$user->firstname = $request->firstname;
        //$user->secondname = $request->secondname;
        //$user->lastname = $request->lastname;
        $user->uid = $request->uid;
        $user->password = $request->password;
        $user->student_number = 0;
        $user->program = $request->program;
        $user->availability = 0;
        $user->role = 'Student';

        $user->save();

        return redirect()->route('start2');
    }
}
