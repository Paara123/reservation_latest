@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Reservation Status') }}</div>

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
                                <th>Actions</th>
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
                                        @if ($reservation->approved_status)
                                            Approved
                                        @else
                                            Not Approved
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{ route('reservation.status.update', $reservation->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <select name="approved_status">
                                                <option value="1" {{ $reservation->approved_status ? 'selected' : '' }}>Approved</option>
                                                <option value="0" {{ !$reservation->approved_status ? 'selected' : '' }}>Rejected</option>
                                            </select>
                                            <button type="submit" class="btn btn-primary btn-sm">Update Status</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                    <!-- Back Button -->
                    <a href="{{ route('admin.home') }}" class="btn btn-secondary">Back to Admin Dashboard</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
