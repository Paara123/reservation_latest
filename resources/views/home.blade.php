@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h2>Guest Dashboard</h2>
                    <a href="{{ route('reservation.create') }}" class="btn btn-primary">Book Your Reservation</a>
                    <a href="{{ route('reservation.index') }}" class="btn btn-primary">View Your Reservations</a>
                    <a href="{{ route('user.reservations') }}" class="btn btn-info">View Reservation Status</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
