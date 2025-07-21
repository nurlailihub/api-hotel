@extends('layouts.admin')

@section('title', 'Ketersediaan Kamar')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Ketersediaan Kamar</h3>
    </div>
    <div class="card-body p-0">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Kamar</th>
                    <th>Tanggal</th>
                    <th>Kamar Tersedia</th>
                </tr>
            </thead>
            <tbody>
                @foreach($availabilities as $availability)
                <tr>
                    <td>{{ $availability->id }}</td>
                    <td>{{ $availability->room->room_type ?? '-' }}</td>
                    <td>{{ $availability->date }}</td>
                    <td>{{ $availability->available_rooms }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer clearfix">
        {{ $availabilities->links() }}
    </div>
</div>
@endsection 