<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReservationDetail;
use App\Models\ResourcePerson;
use Auth;

class ReservationDetailController extends Controller
{
    public function create()
    {
        // Retrieve all resource persons from the database
        $resourcePersons = ResourcePerson::all();
        // Pass the resource persons to the view
        return view('reservation.create', compact('resourcePersons'));
    }

    public function store(Request $request)
{
    $request->validate([
        'reservation_date_from' => 'required|date',
        'reservation_date_to' => 'required|date',
        'reservation_time_slot' => 'required|string',
        'reservation_location' => 'required|array',
        'program_name' => 'required|string',
        'number_of_participants' => 'required|integer',
        'payment_method' => 'required|string',
        'contact_person_name' => 'required|string',
        'contact_person_email' => 'required|email',
        'contact_person_phone' => 'required|string',
        'contact_person_address' => 'required|string',
        'resource_persons' => 'required|array',
    ]);

    $reservationDetail = new ReservationDetail();
    $reservationDetail->user_id = Auth::id();
    $reservationDetail->reservation_date_from = $request->reservation_date_from;
    $reservationDetail->reservation_date_to = $request->reservation_date_to;
    $reservationDetail->reservation_time_slot = $request->reservation_time_slot;
    $reservationDetail->reservation_location = json_encode($request->reservation_location);
    $reservationDetail->program_name = $request->program_name;
    $reservationDetail->number_of_participants = $request->number_of_participants;
    $reservationDetail->payment_method = $request->payment_method;
    $reservationDetail->contact_person_name = $request->contact_person_name;
    $reservationDetail->contact_person_email = $request->contact_person_email;
    $reservationDetail->contact_person_phone = $request->contact_person_phone;
    $reservationDetail->contact_person_address = $request->contact_person_address;
    $reservationDetail->resource_persons = json_encode($request->resource_persons);
    $reservationDetail->save();

    return redirect()->route('home')->with('success', 'Reservation details saved successfully.');
}

public function index()
{
    // Fetch reservations for the logged-in user
    $reservations = ReservationDetail::where('user_id', Auth::id())->get();

    return view('reservation.index', compact('reservations'));
}

public function edit($id)
{
    // Fetch the reservation detail for the logged-in user
    $reservation = ReservationDetail::where('user_id', Auth::id())->findOrFail($id);
    
    // Fetch all resource persons from the resource_persons table
    $resourcePersons = ResourcePerson::all();

    // Pass both the reservation and resource persons to the view
    return view('reservation.edit', compact('reservation', 'resourcePersons'));
}
    public function update(Request $request, $id)
    {
        $reservation = ReservationDetail::findOrFail($id);
    
        $reservation->reservation_date_from = $request->reservation_date_from;
        $reservation->reservation_date_to = $request->reservation_date_to;
        $reservation->reservation_time_slot = $request->reservation_time_slot;
        $reservation->reservation_location = json_encode($request->reservation_location);
        $reservation->program_name = $request->program_name;
        $reservation->number_of_participants = $request->number_of_participants;
        $reservation->payment_method = $request->payment_method;
        $reservation->contact_person_name = $request->contact_person_name;
        $reservation->contact_person_email = $request->contact_person_email;
        $reservation->contact_person_phone = $request->contact_person_phone;
        $reservation->contact_person_address = $request->contact_person_address;
        $reservation->resource_persons = json_encode($request->resource_persons);
    
        $reservation->save();
    
        return redirect()->route('reservation.index')->with('success', 'Reservation updated successfully');
    }
    
    public function show($id)
{
    // Fetch the reservation detail for the logged-in user
    $reservation = ReservationDetail::where('user_id', Auth::id())->findOrFail($id);

    // Fetch all resource persons with their expertise fields
    $resourcePersons = ResourcePerson::all()->keyBy('resource_person_id');
    
    // Pass both the reservation and resource persons to the view
    return view('reservation.show', compact('reservation', 'resourcePersons'));
}
    

public function destroy($id)
    {
        $reservation = ReservationDetail::where('user_id', Auth::id())->findOrFail($id);
        $reservation->delete();

        return redirect()->route('reservation.index')->with('success', 'Reservation cancelled successfully.');
    }
}

