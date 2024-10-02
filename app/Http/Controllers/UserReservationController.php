<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReservationDetail;
use Illuminate\Support\Facades\Auth;

class UserReservationController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $reservations = ReservationDetail::where('user_id', $user->id)->with('status')->get();

        return view('user.reservations', compact('reservations'));
    }
}
