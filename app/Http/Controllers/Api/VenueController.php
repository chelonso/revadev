<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Models\Booking;
use App\Models\Venue;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class VenueController extends Controller
{
    /**
     * Obtiene los bookings de una venue en una fecha y rango de hora.
     *
     * @param Request $request
     * @param Venue $venue
     * @return Response
     */
    public function bookings(Request $request, Venue $venue)
    {
        $validatedData = $request->validate([
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);

        $bookings = Booking::whereDate('date', $validatedData['date'])
        ->whereTime('start_time', '>=', $validatedData['start_time'])
        ->whereTime('end_time', '<=', $validatedData['end_time'])
        ->with('venue','user','field') // Eager load venue
        ->get();
        
        return response()->json($bookings);
    }
}