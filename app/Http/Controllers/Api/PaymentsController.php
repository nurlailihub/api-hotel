<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payments;

class PaymentsController extends Controller
{
    public function index()
    {
        return Payments::all();
    }

    public function show($id)
    {
        return Payments::findOrFail($id);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'payment_method' => 'required|in:credit_card,bank_transfer,e-wallet',
            'payment_status' => 'required|in:unpaid,paid,failed',
            'paid_at' => 'nullable|date',
        ]);
        $payment = Payments::create($data);
        return response()->json($payment, 201);
    }

    public function update(Request $request, $id)
    {
        $payment = Payments::findOrFail($id);
        $data = $request->validate([
            'booking_id' => 'sometimes|exists:bookings,id',
            'payment_method' => 'sometimes|in:credit_card,bank_transfer,e-wallet',
            'payment_status' => 'sometimes|in:unpaid,paid,failed',
            'paid_at' => 'nullable|date',
        ]);
        $payment->update($data);
        return response()->json($payment);
    }

    public function destroy($id)
    {
        $payment = Payments::findOrFail($id);
        $payment->delete();
        return response()->json(['message' => 'Payment deleted']);
    }
}
