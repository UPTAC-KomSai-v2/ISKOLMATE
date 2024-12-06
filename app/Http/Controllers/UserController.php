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
        $user = new User;

        $user->name = $request->name;
        $user->student_number = $request->student_number;
        $user->password = $request->password;
        $user->program = $request->program;
        $user->availability = 0;
        $user->role = 'null';

        $user->save();

        return redirect()->route('start2');
    }
}