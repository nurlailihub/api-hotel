@extends('layouts.admin')

@section('title', 'Daftar Payments')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Daftar Payments</h3>
    </div>
    <div class="card-body p-0">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Booking</th>
                    <th>Metode</th>
                    <th>Status</th>
                    <th>Paid At</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                @foreach($payments as $payment)
                <tr>
                    <td>{{ $payment->id }}</td>
                    <td>{{ $payment->booking->id ?? '-' }}</td>
                    <td>{{ $payment->payment_method }}</td>
                    <td>{{ $payment->payment_status }}</td>
                    <td>{{ $payment->paid_at }}</td>
                    <td>{{ $payment->created_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer clearfix">
        {{ $payments->links() }}
    </div>
</div>
@endsection 