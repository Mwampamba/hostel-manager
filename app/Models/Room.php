<?php

namespace App\Models;

use App\Models\Booking;
use App\Models\Dormitory;
use App\Models\RoomImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Room extends Model
{
    use HasFactory;

    protected $table = 'rooms';
    protected $fillable = [
        'name',
        'description',
        'status',
        'dormitory_id',
        'picture',
    ];

    public function dormitory()
    {
        return $this->belongsTo(Dormitory::class);
    }

    public function room_images()
    {
        return $this->hasMany(RoomImage::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
