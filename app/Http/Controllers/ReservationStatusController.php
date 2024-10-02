<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReservationStatus;
use App\Models\ReservationDetail;

class ReservationStatusController extends Controller
{
    public function index()
    {
        // Retrieve reservations with existing status if available
        // Use left join to include reservation status in the result set
        $reservations = ReservationDetail::leftJoin('reservation_status', 'reservation_details.id', '=', 'reservation_status.reservation_id')
            ->select('reservation_details.*', 'reservation_status.approved_status')
            ->get();

        return view('reservation.status.index', compact('reservations'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'approved_status' => 'required|boolean',
    ]);

    ReservationStatus::updateOrCreate(
        ['reservation_id' => $id],
        ['approved_status' => $request->approved_status]
    );

    return redirect()->route('reservation.status.index')->with('status', 'Reservation status updated successfully.');
}
}
