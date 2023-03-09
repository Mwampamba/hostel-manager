<?php

namespace App\Models;

use App\Models\Booking;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'reg_number',
        'sex',
        'programme',
        'collage',
        'year_of_study',
        'address',
        'academic_year',
        'photo',
        'password',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
