<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rooms extends Model
{
    use HasFactory;

    protected $table = 'rooms';
    protected $fillable = [
        'room_type',
        'price_per_night',
        'description',
        'total_rooms',
        'image_url',
    ];

    public function bookings()
    {
        return $this->hasMany(Bookings::class, 'room_id');
    }

    public function availabilities()
    {
        return $this->hasMany(Room_availability::class, 'room_id');
    }
}
