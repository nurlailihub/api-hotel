@extends('layouts.admin')

@section('title', 'Daftar Bookings')

@section('content')
<div class="mb-3">
    <a href="{{ route('admin.bookings.create') }}" class="btn btn-success">Tambah Booking</a>
</div>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Daftar Bookings</h3>
    </div>
    <div class="card-body p-0">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Room</th>
                    <th>Check In</th>
                    <th>Check Out</th>
                    <th>Total Price</th>
                    <th>Status</th>
                    <th>Payment</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bookings as $booking)
                <tr>
                    <td>{{ $booking->id }}</td>
                    <td>{{ $booking->user->name ?? '-' }}</td>
                    <td>{{ $booking->room->room_type ?? '-' }}</td>
                    <td>{{ $booking->check_in_date }}</td>
                    <td>{{ $booking->check_out_date }}</td>
                    <td>{{ $booking->total_price }}</td>
                    <td>{{ $booking->status }}</td>
                    <td>{{ $booking->payment->payment_status ?? '-' }}</td>
                    <td>
                        <a href="{{ route('admin.bookings.edit', $booking->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('admin.bookings.destroy', $booking->id) }}" method="POST" style="display:inline-block" onsubmit="return confirm('Yakin hapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer clearfix">
        {{ $bookings->links() }}
    </div>
</div>
@endsection 