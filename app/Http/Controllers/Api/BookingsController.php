<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bookings;

class BookingsController extends Controller
{
    public function index()
    {
        return Bookings::all();
    }

    public function show($id)
    {
        return Bookings::findOrFail($id);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'room_id' => 'required|exists:rooms,id',
            'check_in_date' => 'required|date',
            'check_out_date' => 'required|date',
            'total_price' => 'required|numeric',
            'status' => 'required|in:pending,confirmed,cancelled,completed',
        ]);
        $booking = Bookings::create($data);
        return response()->json($booking, 201);
    }

    public function update(Request $request, $id)
    {
        $booking = Bookings::findOrFail($id);
        $data = $request->validate([
            'user_id' => 'sometimes|exists:users,id',
            'room_id' => 'sometimes|exists:rooms,id',
            'check_in_date' => 'sometimes|date',
            'check_out_date' => 'sometimes|date',
            'total_price' => 'sometimes|numeric',
            'status' => 'sometimes|in:pending,confirmed,cancelled,completed',
        ]);
        $booking->update($data);
        return response()->json($booking);
    }

    public function destroy($id)
    {
        $booking = Bookings::findOrFail($id);
        $booking->delete();
        return response()->json(['message' => 'Booking deleted']);
    }
}
