<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    // show login form
    public function showLoginForm()
    {
        return view('login');
    }

    // handle login
    public function login(Request $request)
    {
        $request->validate([
            'uid' => 'required|string',
            'password' => 'required|string'
        ]);

        if (Auth::attempt(['uid' => $request->uid, 'password' => $request->password])) {
            $request->session()->regenerate();
            // start debug
            if (Auth::check()) {
                Log::info('Authenticated user:', [Auth::user()]);
            } else {
                Log::error('Auth check failed.');
            }
            Log::info('User logged in successfully');
            // end debug
            return redirect('dashboard');
        }

        Log::info('User not logged in');
        return back()->withErrors([
            'uid' => 'The provided credentials do not match our records.',
        ]);
    }
}
