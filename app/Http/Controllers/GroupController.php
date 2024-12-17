<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Group;
use GuzzleHttp\Psr7\Message;

class GroupController extends Controller
{
    public function storeGroup(Request $request)
    {
        // Ensure we are logged in to a session
        if (!Auth::check()) {
            return redirect()->route('/');
        }

        $request->validate([
            'name' => 'required|string|max:255|min:1'
        ]);

        $user = $request->user();

        DB::transaction(function () use ($request, $user) {
            $group = Group::create([
                'group_name' => $request->name
            ]);

            DB::insert('insert into user_group (u_id, g_id) values (?, ?)', [
                $user->id,
                $group->group_id
            ]);
        });

        return redirect()->route('group.view')->with('message', 'Group created successfully!');
    }

    public function viewGroups(Request $request)
    {
        $user = $request->user();

        $user_groups = DB::select('select * from user_group where u_id = ?', [ $user->id ]);

        $user_group_ids = array_column($user_groups, 'g_id');

        $groups = Group::whereIn('group_id', $user_group_ids)
            ->whereNotIn('group_id', [1, 2])
            ->get();

        return view('groups.view', [
            'groups' => $groups
        ]);
    }

    public function deleteGroups(Request $request, $group_id)
    {
        $group = DB::select('select * from groups where group_id = ? limit 1', [ $group_id ]);

        if(!$group) {
            return redirect()->route('group.view');
        }

        DB::transaction(function () use ($group_id) {
            DB::delete('delete from user_group where g_id = ?', [ $group_id ]);

            DB::delete('delete from groups where group_id = ?', [$group_id]);
        });

        return redirect()->route('group.view')->with('message', 'Group deleted successfully!');
    }

    public function viewGroupMembers(Request $request, $group_id)
    {
        $group = DB::select('select * from groups where group_id = ? limit 1', [ $group_id ]);

        if(!$group) {
            return redirect()->route('group.view');
        }

        $members = DB::select('select users.first_name, users.last_name, users.id from users join user_group on users.id = user_group.u_id where user_group.g_id = ?', [ $group_id ]);

        return view('groups.details', [
            'members' => $members,
            'group' => $group[0],
            'user' => $request->user(),
        ]);
    }

    public function includeUser(Request $request, $group_id)
    {
        $request->validate([
            'uid' => 'required|numeric|digits:9',
        ]);

        // $group_pair = DB::select('select * from user_group where g_id = ? and u_id = ? limit 1', [ $group_id, $request->uid ]);

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
}
