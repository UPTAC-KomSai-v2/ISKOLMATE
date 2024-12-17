<?php

namespace App\Http\Controllers;
use App\Models\Availability;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AvailabilityController extends Controller
{
    public function storeAvailability(Request $request) {
        //validate the input
        $validated = $request->validate([
            'availability_date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);

        $availabilityDate = $validated['availability_date'];
        $startTime = $validated['start_time'];
        $endTime = $validated['end_time'];
        $userId = Auth::id();

        // try {
        //     DB::transaction(function() use ($userId, $availabilityDate, $startTime, $endTime) {
        //         DB::insert('INSERT INTO availabilities (user_id, date, time_start, time_end) VALUES (?, ?, ?, ?)', [
        //             $userId,
        //             $availabilityDate,
        //             $startTime,
        //             $endTime
        //         ]);
        //     });
        // } catch (\Exception $e) {
            //     return back()->with('error', 'Failed to set availability. Error: ' . $e->getMessage());
            // }
        try {
            Availability::create([
                'user_id' => Auth::id(),
                'time_start' => $startTime,
                'time_end' => $endTime,
                'date' => $availabilityDate,
            ]);
    
            return redirect()->route('availability')->with('success', 'Availability set successfully');

        } catch(\Exception $e) {
            return back()->with('errors', 'Failed to set availability. Error: ' . $e->getMessage());
        }
    }
}
