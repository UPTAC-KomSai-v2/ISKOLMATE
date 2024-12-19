<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Announcement;
use App\Models\AnnouncementCreator;
use App\Models\AnnouncementVisibility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AnnouncementController extends Controller
{
    public function show(Request $request)
    {
        $user = $request->user();
        $announcements = Announcement::all();

        return view('dashboard.announcements.view', [ 'first_name' => $user->first_name, 'last_name' => $user->last_name, 'position' => $user->role, 'announcements' => $announcements ]);
    }

    public function showCreateForm(Request $request)
    {
        $user = $request->user();

        return view('dashboard.announcements.create', [ 'user' => $user ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'visibility_group' => 'string'
        ]);

        $has_group = isset($validated["visibility_group"]) && $validated["visibility_group"] != "" && $validated["visibility_group"] != "global";

        if ($has_group) {
            $group = Group::find($validated["visibility_group"]);

            if (!$group) {
                return redirect()->route('announcements.create')->with('error', 'Target group does not exist!');
            }
        }

        DB::transaction(function () use ($validated, $has_group) {
            $announcement = Announcement::create([
                'title' => $validated['title'],
                'text' => $validated['content'],
            ]);
    
            AnnouncementCreator::create([
                'annc_id' => $announcement->id,
                'u_id' => Auth::id(),
            ]);

            if ($has_group) {
                AnnouncementVisibility::create([
                    'annc_id' => $announcement->id,
                    'g_id' => $validated["visibility_group"],
                ]);
            }
        });

        return redirect()->route('announcements.view')->with('success', 'Announcement posted successfully!');
    }

    public function destroy(Request $request, $id)
    {
        $user = $request->user();

        $announcement = Announcement::find($id);

        if (!$announcement) {
            return redirect()->route('announcements.view')->with('error', 'Announcement does not exist!');
        }

        $creator = AnnouncementCreator::find($id);

        if ($creator->u_id != $user->id) {
            return redirect()->route('announcements.view')->with('error', 'You are not permitted to delete someone else\'s announcement!');
        }

        DB::transaction(function () use ($id, $announcement, $creator) {
            $creator->delete();
            DB::delete('delete from annc_visibility where annc_id = ?', [ $id ]);
            $announcement->delete();
        });

        return redirect()->route('announcements.view')->with('success', 'Announcement deleted successfully!');
    }
}

