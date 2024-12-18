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
    public function show(Request $request)
    {
        $user = $request->user();
        $tasks = Activity::all();

        $user_tasks = [];

        foreach ($tasks as $task) {
            if ($task->get_owner_id() == $user->id) {
                array_push($user_tasks, $task);
            }
        }

        return view('dashboard.tasks.view', [ 'first_name' => $user->first_name, 'last_name' => $user->last_name, 'position' => $user->role, 'tasks' => $user_tasks]);
    }

    public function store(Request $request)
    {
        $user = $request->user();

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        DB::transaction(function () use ($validated, $id, $user) {
            $task = Activity::create([
                'title' => $validated['title'],
                'description' => $validated['description'],
                'deadline' => '2025-01-01 05:06:49.000000',
            ]);
    
            ActivityCreator::create([
                'act_id' => $task->id,
                'u_id' => $user->id,
            ]);
        });

        return redirect()->route('tasks.message', $task->id)->with('success', 'Task posted successfully!');
    }

    public function destroy(Request $request, $id)
    {
        $user = $request->user();

        $activity = Activity::find($id);

        if (!$activity) {
            return redirect()->route('tasks.list')->with('error', 'Task does not exist!');
        }

        $creator = ActivityCreator::find($id);

        if ($creator->u_id != $user->id) {
            return redirect()->route('tasks.list')->with('error', 'You are not permitted to delete someone else\'s task!');
        }

        DB::transaction(function () use ($id, $activity, $creator) {
            $creator->delete();
            DB::delete('delete from act_visibility where act_id = ?', [ $id ]);
            $activity->delete();
        });

        return redirect()->route('tasks.list')->with('success', 'Task deleted successfully!');
    }
}
