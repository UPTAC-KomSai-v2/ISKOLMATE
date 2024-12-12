<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Group;

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

        return redirect()->route('group.view');
    }

    public function viewGroups(Request $request)
    {
        $user = $request->user();

        $user_groups = DB::select('select * from user_group where u_id = ?', [ $user->id ]);

        $user_group_ids = array();

        foreach ($user_groups as $user_group) {
            array_push($user_group_ids, $user_group->g_id);
        }

        $groups = Group::whereIn('group_id', $user_group_ids)->get();

        return view('groups.view', [
            'groups' => $groups
        ]);
    }
}
