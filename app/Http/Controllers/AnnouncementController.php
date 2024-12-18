<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\AnnouncementCreator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AnnouncementController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $announcement = Announcement::create([
            'title' => $validated['title'],
            'text' => $validated['content'],
        ]);

        AnnouncementCreator::create([
            'annc_id' => $announcement->id,
            'u_id' => Auth::id(),
        ]);

        return redirect()->route('announcements.view')->with('success', 'Announcement posted successfully!');
    }

    public function destroy($id)
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
            $announcement->delete();
            DB::delete('delete from annc_visibility where annc_id = ?', [ $id ]);
            $creator->delete();
        });

        return redirect()->route('announcements.view')->with('success', 'Announcement deleted successfully!');
    }
}

