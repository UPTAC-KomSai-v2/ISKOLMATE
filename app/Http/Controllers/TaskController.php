<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Activity;

class TaskController extends Controller
{
    public function show()
    {
        return view('tasks');
    }

    public function storeInputTask(Request $request)
    {
        // Ensure we are logged in to a session
        if (!Auth::check()) {
            return redirect()->route('/');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'deadline' => 'required|date'
        ]);

        DB::transaction(function () use ($request, $task) {
            $task = Activity::create([
                'title' => $request->title,
                'description' => $request->description,
                'deadline' => $request->deadline
            ]);

            DB::insert('insert into activity_creator (act_id, u_id) values (?, ?)', [
                $task->id,
                $request->user()->id,
            ]);
        });

        return redirect()->route('tasks');
    }

}