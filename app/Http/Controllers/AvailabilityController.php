<?php

namespace App\Http\Controllers;
use App\Models\Availability;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AvailabilityController extends Controller
{
    public function storeAvailability(Request $request)
    {
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

        Availability::create([
            'user_id' => Auth::id(),
            'time_start' => $startTime,
            'time_end' => $endTime,
            'date' => $availabilityDate,
        ]);

        return redirect()->route('availability')->with('success', 'Availability set successfully');
    }

    public function searchAvailability(Request $request)
    {
        $validated = $request->validate([
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);

        $user = Auth::user();

        $availabilities = Availability::select(['av_id', 'user_id', 'date', 'time_start', 'time_end'])
            ->where('date', $validated['date'])
            ->where(function ($query) use ($validated) {
                $query->whereBetween('time_start', [$validated['start_time'], $validated['end_time']])
                    ->orWhereBetween('time_end', [$validated['start_time'], $validated['end_time']]);
            })
            ->whereNot('user_id', $user->id)
            ->with(['user' => function ($query) {
                $query->select(['id', 'first_name', 'last_name', 'role']);
            }])->get();

        return response()->json(['availabilities' => $availabilities]);
    }

    public function destroy($id)
    {
        $availability = Availability::find($id);
        $user = Auth::user();

        if (!empty($availability)) {
            $availability->delete();

            $data = ['message' => 'Record deleted successfully', 'availabilities' => Availability::where('user_id', $user->id)->get()];
            $responseCode = 200;
        } else {
            $data = ['message' => 'Record not found'];
            $responseCode = 404;
        }

        return response()->json($data, $responseCode);
    }
}
