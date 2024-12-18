<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\AnnouncementCreator;
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

        return view('dashboard.announcements.create', [ 'name' => $user->name, 'position' => $user->role ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        DB::transaction(function () use ($validated) {
            $announcement = Announcement::create([
                'title' => $validated['title'],
                'text' => $validated['content'],
            ]);
    
            AnnouncementCreator::create([
                'annc_id' => $announcement->id,
                'u_id' => Auth::id(),
            ]);
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

        if($creator->u_id != $user->id){
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

