<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'text' => 'required|string',
        ]);

        Announcement::create([
            'title' => $validated['title'],
            'text' => $validated['text'],
        ]);

        return redirect()->route('announcements')->with('success', 'Announcement posted successfully!');
    }
}

