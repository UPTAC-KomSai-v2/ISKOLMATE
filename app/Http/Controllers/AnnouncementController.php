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

        return redirect()->route('announcements')->with('success', 'Announcement posted successfully!');
    }

    public function destroy($id)
    {
        $announcement = Announcement::findOrFail($id);

        $creator = AnnouncementCreator::where('annc_id', $id)->where('u_id', Auth::id())->first();

        if(!$creator){
            return redirect()->route('announcements')->with('error', 'You are not the announcement creator! User not authorized to delete this announcement!');
        }

        $creator->delete();
        $announcement->delete();
        return redirect()->route('announcements')->with('success', 'Announcement deleted successfully!');
    }
}

