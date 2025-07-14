<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room_availability;

class RoomAvailabilityController extends Controller
{
    public function index()
    {
        return Room_availability::all();
    }

    public function show($id)
    {
        return Room_availability::findOrFail($id);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'date' => 'required|date',
            'available_rooms' => 'required|integer',
        ]);
        $availability = Room_availability::create($data);
        return response()->json($availability, 201);
    }

    public function update(Request $request, $id)
    {
        $availability = Room_availability::findOrFail($id);
        $data = $request->validate([
            'room_id' => 'sometimes|exists:rooms,id',
            'date' => 'sometimes|date',
            'available_rooms' => 'sometimes|integer',
        ]);
        $availability->update($data);
        return response()->json($availability);
    }

    public function destroy($id)
    {
        $availability = Room_availability::findOrFail($id);
        $availability->delete();
        return response()->json(['message' => 'Room availability deleted']);
    }
}
