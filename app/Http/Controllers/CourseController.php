<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Group;
use App\Models\Teaches;

class CourseController extends Controller
{
    public function storeGroup(Request $request)
    {
        // Ensure we are logged in to a session
        if (!Auth::check()) {
            return redirect()->route('/');
        }

        $user = $request->user();

        if (!$user->is_teacher()) {
            return redirect()->route('group.create')->with('error', 'You are not permitted to create courses!');
        }

        $request->validate([
            'name' => 'required|string|max:255|min:1'
        ]);

        DB::transaction(function () use ($request, $user) {
            $group = Group::create([
                'group_name' => $request->name
            ]);

            Teaches::create([
                'ins_id' => $user->id,
                'g_id' => $group->group_id
            ]);
        });

        return redirect()->route('group.view')->with('message', 'Course created successfully!');
    }

    public function viewGroups(Request $request)
    {
        $user = $request->user();

        $groups = $user->get_courses();

        return view('dashboard.groups.view', [
            'groups' => $groups,
            'user' => $request->user(),
        ]);
    }

    public function deleteGroups(Request $request, $group_id)
    {
        $user = $request->user();

        if (!$user->is_teacher()) {
            return redirect()->route('group.members', $group_id)->with('error', 'You are not permitted to delete courses!');
        }

        $group = Group::find($group_id);

        if(!$group) {
            return redirect()->route('group.view');
        }

        $teaches = $group->get_teaches();

        if ($teaches->ins_id != $user->id) {
            return redirect()->route('group.members', $group_id)->with('error', 'You are not permitted to delete this course!');
        }

        DB::transaction(function () use ($group, $teaches) {
            DB::delete('delete from user_group where g_id = ?', [ $group->group_id ]);
            $teaches->delete();
            $group->delete();
        });

        return redirect()->route('group.view')->with('message', 'Course deleted successfully!');
    }

    public function viewGroupMembers(Request $request, $group_id)
    {
        $group = DB::select('select * from groups where group_id = ? limit 1', [ $group_id ]);

        if(!$group) {
            return redirect()->route('group.view');
        }

        $members = DB::select('select users.first_name, users.last_name, users.id from users join user_group on users.id = user_group.u_id where user_group.g_id = ?', [ $group_id ]);

        return view('dashboard.groups.details', [
            'members' => $members,
            'group' => $group[0],
            'user' => $request->user(),
        ]);
    }

    public function includeUser(Request $request, $group_id)
    {
        $user = $request->user();

        if (!$user->is_teacher()) {
            return redirect()->route('group.members', $group_id)->with('error', 'You are not permitted to edit courses!');
        }

        $group = Group::find($group_id);

        if(!$group) {
            return redirect()->route('group.view')->with('error', 'That course does not exist!');
        }

        if ($group->get_owner_id() != $user->id) {
            return redirect()->route('group.members', $group_id)->with('error', 'You are not permitted to edit this course!');
        }

        $request->validate([
            'uid' => 'required|numeric|digits:9',
        ]);

        $target_user = User::find($request->uid);

        if (!$target_user) {
            return redirect()->route('group.members', $group_id)->with('error', 'User does not exist!');
        }

        if ($target_user->is_teacher()) {
            return redirect()->route('group.members', $group_id)->with('error', 'You are not permitted to add teachers to courses!');
        }

        try {
            DB::transaction(function () use ($request, $group_id) {
                DB::insert('insert into user_group (u_id, g_id) values (?, ?)', [
                    $request->uid,
                    $group_id
                ]);
            });

            return redirect()->route('group.members', $group_id);
    
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == 23000) { // MySQL duplicate entry error code
                return redirect()->route('group.members', $group_id)
                    ->with('error', 'User is already a member of the group.');
            }
        }
    }

    public function excludeUser(Request $request, $group_id)
    {
        $user = $request->user();

        if (!$user->is_teacher()) {
            return redirect()->route('group.members', $group_id)->with('error', 'You are not permitted to edit courses!');
        }

        $group = Group::find($group_id);

        if(!$group) {
            return redirect()->route('group.view')->with('error', 'That course does not exist!');
        }

        if ($group->get_owner_id() != $user->id) {
            return redirect()->route('group.members', $group_id)->with('error', 'You are not permitted to edit this course!');
        }

        $request->validate([
            'uid' => 'required|numeric|digits:9',
        ]);

        DB::transaction(function () use ($request, $group_id) {
            DB::delete('delete from user_group where u_id = ? and g_id = ?', [
                $request->uid,
                $group_id
            ]);
        });

        return redirect()->route('group.members', $group_id);
    }

    public function viewCreate()
    {
        return view('dashboard.groups.create');
    }
}
