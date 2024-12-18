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
    
    public function showCreateForm()
    {
        return view('dashboard.tasks.create');
    }

    public function store(Request $request)
    {
        $user = $request->user();

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        try {
            DB::beginTransaction();

            $task = Activity::create([
                'title' => $validated['title'],
                'description' => $validated['description'],
                'deadline' => '2025-01-01 05:06:49.000000',
            ]);
    
            ActivityCreator::create([
                'act_id' => $task->id,
                'u_id' => $user->id,
            ]);

            DB::commit();

            return redirect()->route('tasks.list', $task->id)->with('success', 'Task posted successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
        }
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

        if ($task->get_owner_id() != $user->id) {
            return redirect()->route('tasks.list');
        }

        return view('dashboard.tasks.details', [ 'name' => $user->name, 'position' => $user->role, 'task' => $task ]);
    }
}
