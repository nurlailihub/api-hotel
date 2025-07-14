<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room_availability extends Model
{
    use HasFactory;

    protected $table = 'room_availability';
    public $timestamps = false;
    protected $fillable = [
        'room_id',
        'date',
        'available_rooms',
    ];

    public function room()
    {
        return $this->belongsTo(Rooms::class, 'room_id');
    }
}
