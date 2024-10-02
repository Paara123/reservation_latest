@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reservation Details') }}</div>

                <div class="card-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>Reservation Date From</th>
                                <td>{{ $reservation->reservation_date_from }}</td>
                            </tr>
                            <tr>
                                <th>Reservation Date To</th>
                                <td>{{ $reservation->reservation_date_to }}</td>
                            </tr>
                            <tr>
                                <th>Time Slot</th>
                                <td>{{ $reservation->reservation_time_slot }}</td>
                            </tr>
                            <tr>
                                <th>Program Name</th>
                                <td>{{ $reservation->program_name }}</td>
                            </tr>
                            <tr>
                                <th>Number of Participants</th>
                                <td>{{ $reservation->number_of_participants }}</td>
                            </tr>
                            <tr>
                                <th>Payment Method</th>
                                <td>{{ $reservation->payment_method }}</td>
                            </tr>
                            <tr>
                                <th>Contact Person Name</th>
                                <td>{{ $reservation->contact_person_name }}</td>
                            </tr>
                            <tr>
                                <th>Contact Person Email</th>
                                <td>{{ $reservation->contact_person_email }}</td>
                            </tr>
                            <tr>
                                <th>Contact Person Phone</th>
                                <td>{{ $reservation->contact_person_phone }}</td>
                            </tr>
                            <tr>
                                <th>Contact Person Address</th>
                                <td>{{ $reservation->contact_person_address }}</td>
                            </tr>
                            <tr>
                                <th>Resource Persons</th>
                                <td>
                                    @php
                                        $resourcePersonIds = json_decode($reservation->resource_persons, true);
                                    @endphp

                                    @if(is_array($resourcePersonIds))
                                        <ul>
                                            @foreach($resourcePersonIds as $id)
                                                @if(isset($resourcePersons[$id]))
                                                    <li>
                                                        {{ $resourcePersons[$id]->resource_person_name }}
                                                        : {{ $resourcePersons[$id]->expertise_fields }}
                                                    </li>
                                                @else
                                                    <li>Unknown</li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    @else
                                        {{ $reservation->resource_persons }}
                                    @endif
                                </td>
                            </tr>
                            
                            <tr>
                                <th>Location</th>
                                <td>
                                    @php
                                        $reservationLocations = json_decode($reservation->reservation_location, true);
                                    @endphp

                                    @if(is_array($reservationLocations))
                                        {{ implode(', ', $reservationLocations) }}
                                    @else
                                        {{ $reservation->reservation_location }}
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="{{ route('reservation.index') }}" class="btn btn-primary">Back to Reservations</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
