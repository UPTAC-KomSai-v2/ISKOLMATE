<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Activity;
use App\Models\ActivityCreator;
use App\Models\ActivityVisibility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TaskController extends Controller
{
    public function show(Request $request)
    {
        $user = $request->user();
        $tasks = Activity::all();

        $user_tasks = [];

        foreach ($tasks as $task) {
            $visibility = ActivityVisibility::find($task->id);
            
            if ($task->get_owner_id() == $user->id || ($visibility && $user->in_course($visibility->g_id))) {
                array_push($user_tasks, $task);
            }
        }

        return view('dashboard.tasks.view', [ 'first_name' => $user->first_name, 'last_name' => $user->last_name, 'position' => $user->role, 'tasks' => $user_tasks ]);
    }
    
    public function showCreateForm(Request $request)
    {
        return view('dashboard.tasks.create', [ 'user' => $request->user() ]);
    }

    public function store(Request $request)
    {
        $user = $request->user();

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'visibility_group' => 'string'
        ]);

        $has_group = isset($validated["visibility_group"]) && $validated["visibility_group"] != "" && $validated["visibility_group"] != "global";

        if ($has_group) {
            $group = Group::find($validated["visibility_group"]);

            if (!$group) {
                return redirect()->route('tasks.create')->with('error', 'Target group does not exist!');
            }
        }

        DB::transaction(function () use ($validated, $user, $has_group) {
            $task = Activity::create([
                'title' => $validated['title'],
                'description' => $validated['description'],
                'deadline' => '2025-01-01 05:06:49.000000',
            ]);

            ActivityCreator::create([
                'act_id' => $task->id,
                'u_id' => $user->id,
            ]);

            if ($has_group) {
                ActivityVisibility::create([
                    'act_id' => $task->id,
                    'g_id' => $validated["visibility_group"],
                ]);
            }
        });

        return redirect()->route('tasks.list')->with('success', 'Task posted successfully!');
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
    
    public function showTask(Request $request, $id)
    {
        $user = $request->user();
        $task = Activity::find($id);

        if (!$task) {
            return redirect()->route('tasks.list');
        }

        $visibility = ActivityVisibility::find($id);

        if ($task->get_owner_id() != $user->id && ($visibility && !$user->in_course($visibility->g_id))) {
            return redirect()->route('tasks.list');
        }

        return view('dashboard.tasks.details', [ 'name' => $user->name, 'position' => $user->role, 'task' => $task ]);
    }
}
