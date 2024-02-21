<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Models\Booking;
use App\Models\Venue;
use App\Models\Field;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FieldController extends Controller
{
    /**
     * Obtiene los bookings de una venue en una fecha y rango de hora.
     *
     * @param Request $request
     * @param Venue $venue
     * @param Field $field
     * @return Response
     */
    public function bookings(Request $request, Venue $venue, Field $field)
    {
        $validatedData = $request->validate([
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);
    
        $bookings = $field->bookings()
            ->whereDate('date', $validatedData['date'])
            ->whereTime('start_time', '>=', $validatedData['start_time'])
            ->whereTime('end_time', '<=', $validatedData['end_time'])
            ->with('field','venue','user')
            ->get();
    
        return response()->json($bookings);
    }
}