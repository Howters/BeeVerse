<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookings extends Model
{
    use HasFactory;
    public function movie(){
        return $this->belongsTo(Movie::class, 'MovieID');
    }
    protected $fillable = [
        'BookingDate',
        'BookingTime',
        'SeatNumber',
        'TheaterLocation',
        'UserID',
        'MovieID',
    ];
}
