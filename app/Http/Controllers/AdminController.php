<?php

namespace App\Http\Controllers;

use App\Models\Bookings;
use App\Models\Rooms;
use App\Models\Payments;
use App\Models\Room_availability;
use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalBookings = Bookings::count();
        $totalRooms = Rooms::count();
        $totalPayments = Payments::count();
        $totalAvailableRooms = Room_availability::sum('available_rooms');
        return view('admin.dashboard', compact('totalBookings', 'totalRooms', 'totalPayments', 'totalAvailableRooms'));
    }

    public function bookings()
    {
        $bookings = Bookings::with(['user', 'room', 'payment'])->latest()->paginate(10);
        return view('admin.bookings', compact('bookings'));
    }

    public function rooms()
    {
        $rooms = Rooms::with('bookings', 'availabilities')->latest()->paginate(10);
        return view('admin.rooms', compact('rooms'));
    }

    public function payments()
    {
        $payments = Payments::with('booking')->latest()->paginate(10);
        return view('admin.payments', compact('payments'));
    }

    public function availability()
    {
        $availabilities = Room_availability::with('room')->latest('date')->paginate(10);
        return view('admin.availability', compact('availabilities'));
    }

    // CRUD Bookings
    public function createBooking()
    {
        $users = User::all();
        $rooms = Rooms::all();
        return view('admin.bookings_create', compact('users', 'rooms'));
    }

    public function storeBooking(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'room_id' => 'required|exists:rooms,id',
            'check_in_date' => 'required|date',
            'check_out_date' => 'required|date|after_or_equal:check_in_date',
            'total_price' => 'required|numeric',
            'status' => 'required',
        ]);
        Bookings::create($validated);
        return redirect()->route('admin.bookings')->with('success', 'Booking created!');
    }

    public function editBooking($id)
    {
        $booking = Bookings::findOrFail($id);
        $users = User::all();
        $rooms = Rooms::all();
        return view('admin.bookings_edit', compact('booking', 'users', 'rooms'));
    }

    public function updateBooking(Request $request, $id)
    {
        $booking = Bookings::findOrFail($id);
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'room_id' => 'required|exists:rooms,id',
            'check_in_date' => 'required|date',
            'check_out_date' => 'required|date|after_or_equal:check_in_date',
            'total_price' => 'required|numeric',
            'status' => 'required',
        ]);
        $booking->update($validated);
        return redirect()->route('admin.bookings')->with('success', 'Booking updated!');
    }

    public function destroyBooking($id)
    {
        $booking = Bookings::findOrFail($id);
        $booking->delete();
        return redirect()->route('admin.bookings')->with('success', 'Booking deleted!');
    }
} 