<?php

namespace App\Http\Controllers;

use App\Models\ActivityCreator;
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

    public function store(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
        ]);

        $task = Activity::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'deadline' => '2025-01-01 05:06:49.000000',
        ]);

        $activityCreator = ActivityCreator::create([
            'act_id' => $task->id,
            'u_id' => $user->id,
        ]);

        return redirect()->route('tasks.message', $task->id)->with('success', 'Task posted successfully!');
    }

    public function destroy($id)
    {
        $activityCreator = ActivityCreator::where('act_id', $id)->delete();
        $task = Activity::find($id)->delete();

        return redirect()->route('tasks.list')->with('success', 'Task deleted successfully!');
    }
}
