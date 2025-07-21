@extends('layouts.admin')

@section('title', 'Edit Booking')

@section('content')
<div class="card">
    <div class="card-header"><h3 class="card-title">Edit Booking</h3></div>
    <form method="POST" action="{{ route('admin.bookings.update', $booking->id) }}">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="form-group">
                <label>User</label>
                <select name="user_id" class="form-control" required>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ $booking->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Room</label>
                <select name="room_id" class="form-control" required>
                    @foreach($rooms as $room)
                        <option value="{{ $room->id }}" {{ $booking->room_id == $room->id ? 'selected' : '' }}>{{ $room->room_type }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Check In</label>
                <input type="date" name="check_in_date" class="form-control" value="{{ $booking->check_in_date }}" required>
            </div>
            <div class="form-group">
                <label>Check Out</label>
                <input type="date" name="check_out_date" class="form-control" value="{{ $booking->check_out_date }}" required>
            </div>
            <div class="form-group">
                <label>Total Price</label>
                <input type="number" name="total_price" class="form-control" value="{{ $booking->total_price }}" required>
            </div>
            <div class="form-group">
                <label>Status</label>
                <input type="text" name="status" class="form-control" value="{{ $booking->status }}" required>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('admin.bookings') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection 