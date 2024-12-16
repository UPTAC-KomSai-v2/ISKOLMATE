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
        $announcement = DB::select('select * from announcements where id = ? limit 1', [$id]);
        $creator = AnnouncementCreator::where('annc_id', $id)->where('u_id', Auth::id())->first();

        if(!$creator){
            return redirect()->route('announcements.view')->with('error', 'You are not the announcement creator! User not authorized to delete this announcement!');
        }

        DB::transaction(function () use ($id, $announcement, $creator) {DB::delete('delete from announcement_creator where annc_id = ?', [$id]);});
        DB::delete('delete from announcements where id = ?', [$id]);

        return redirect()->route('announcements.view')->with('success', 'Announcement deleted successfully!');
    }
}

