@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Your Reservations') }}</div>

                <div class="card-body">
                    @if ($reservations->isEmpty())
                        <p>You have no reservations yet.</p>
                    @else
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Reservation Date From</th>
                                    <th>Reservation Date To</th>
                                    <th>Time Slot</th>
                                    <th>Program Name</th>
                                    <th>Number of Participants</th>
                                    <th>Payment Method</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reservations as $reservation)
                                    <tr>
                                        <td>{{ $reservation->reservation_date_from }}</td>
                                        <td>{{ $reservation->reservation_date_to }}</td>
                                        <td>{{ $reservation->reservation_time_slot }}</td>
                                        <td>{{ $reservation->program_name }}</td>
                                        <td>{{ $reservation->number_of_participants }}</td>
                                        <td>{{ $reservation->payment_method }}</td>
                                        <td>
                                             <!-- Back Button -->
                                             <a href="{{ route('home', $reservation->id) }}" class="btn btn-primary btn-sm">Back</a>

                                            <!-- View Button -->
                                            <a href="{{ route('reservation.show', $reservation->id) }}" class="btn btn-info btn-sm">View Full Details</a>

                                            <!-- Edit Button -->
                                            @if (\Carbon\Carbon::parse($reservation->reservation_date_to)->isAfter(now()->addDays(7)))
                                                <a href="{{ route('reservation.edit', $reservation->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                            @else
                                                <button type="button" class="btn btn-secondary btn-sm" disabled>Edit</button>
                                            @endif
                                            <!-- Cancel Button -->
                                            @if (\Carbon\Carbon::parse($reservation->reservation_date_to)->isAfter(now()->addDays(7)))
                                                <form action="{{ route('reservation.destroy', $reservation->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Cancel</button>
                                                </form>
                                            @else
                                                <button type="button" class="btn btn-secondary btn-sm" disabled>Cancel</button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
