@extends('layouts.admin')

@section('title', 'Daftar Rooms')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Daftar Rooms</h3>
    </div>
    <div class="card-body p-0">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tipe</th>
                    <th>Harga/Malam</th>
                    <th>Deskripsi</th>
                    <th>Total Kamar</th>
                    <th>Gambar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rooms as $room)
                <tr>
                    <td>{{ $room->id }}</td>
                    <td>{{ $room->room_type }}</td>
                    <td>{{ $room->price_per_night }}</td>
                    <td>{{ $room->description }}</td>
                    <td>{{ $room->total_rooms }}</td>
                    <td>
                        @if($room->image_url)
                            <img src="{{ $room->image_url }}" alt="Room Image" width="60">
                        @else
                            -
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer clearfix">
        {{ $rooms->links() }}
    </div>
</div>
@endsection 