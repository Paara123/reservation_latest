@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Your Reservations') }}</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Reservation Date From</th>
                                <th>Reservation Date To</th>
                                <th>Program Name</th>
                                <th>Number of Participants</th>
                                <th>Approved Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reservations as $reservation)
                                <tr>
                                    <td>{{ $reservation->id }}</td>
                                    <td>{{ $reservation->reservation_date_from }}</td>
                                    <td>{{ $reservation->reservation_date_to }}</td>
                                    <td>{{ $reservation->program_name }}</td>
                                    <td>{{ $reservation->number_of_participants }}</td>
                                    <td>
                                        @if ($reservation->status && $reservation->status->approved_status)
                                            Approved
                                        @elseif($reservation->status && !$reservation->status->approved_status)
                                            Rejected
                                        @else
                                            Pending
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
