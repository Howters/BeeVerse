<?php

namespace App\Http\Controllers;
use App\Models\Bookings;
use App\Models\Movie;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class listBookedController extends Controller
{
    public function getListBooked (){
        $userID = Auth::id();
        // return $userID;
        $userBookings = Bookings::where('UserID', $userID)->get();
        // return $userBookings;
        return view('list-booked', compact('userBookings'));
    }
}
