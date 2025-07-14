<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rooms;

class RoomsController extends Controller
{
    public function index()
    {
        return Rooms::all();
    }

    public function show($id)
    {
        return Rooms::findOrFail($id);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'room_type' => 'required|string|max:100',
            'price_per_night' => 'required|numeric',
            'description' => 'required',
            'total_rooms' => 'required|integer',
            'image_url' => 'required',
        ]);
        $room = Rooms::create($data);
        return response()->json($room, 201);
    }

    public function update(Request $request, $id)
    {
        $room = Rooms::findOrFail($id);
        $data = $request->validate([
            'room_type' => 'sometimes|string|max:100',
            'price_per_night' => 'sometimes|numeric',
            'description' => 'sometimes',
            'total_rooms' => 'sometimes|integer',
            'image_url' => 'sometimes',
        ]);
        $room->update($data);
        return response()->json($room);
    }

    public function destroy($id)
    {
        $room = Rooms::findOrFail($id);
        $room->delete();
        return response()->json(['message' => 'Room deleted']);
    }
}
