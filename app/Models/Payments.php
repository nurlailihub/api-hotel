<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    use HasFactory;

    protected $table = 'payments';
    public $timestamps = false;
    protected $fillable = [
        'booking_id',
        'payment_method',
        'payment_status',
        'paid_at',
        'created_at',
    ];

    public function booking()
    {
        return $this->belongsTo(Bookings::class, 'booking_id');
    }
}
