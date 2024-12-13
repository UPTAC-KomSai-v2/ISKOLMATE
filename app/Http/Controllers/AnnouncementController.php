<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\AnnouncementCreator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnnouncementController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'text' => 'required|string',
        ]);

        $announcement = Announcement::create([
            'title' => $validated['title'],
            'text' => $validated['text'],
        ]);

        AnnouncementCreator::create([
            'announcement_id' => $announcement->id,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('announcements')->with('success', 'Announcement posted successfully!');
    }

    public function destroy($id)
    {
        $announcement = Announcement::findOrFail($id);

        $creator = AnnouncementCreator::where('announcement_id', $id)->where('user_id', Auth::id())->first();

        if(!$creator){
            return redirect()->route('announcements')->with('error', 'You are not the announcement creator! User not authorized to delete this announcement!');
        }

        $announcement->delete();
        $creator->delete();
        return redirect()->route('announcements')->with('success', 'Announcement deleted successfully!');
    }
}

