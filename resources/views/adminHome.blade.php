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

                    <h2>Admin Dashboard</h2>

                    <a href="{{ route('resource-person.index') }}" class="btn btn-primary">Resource Person Details</a>

                    <!-- Add User Management Button -->
                    <a href="{{ route('admin.user.index') }}" class="btn btn-primary">Manage Users</a>

                    <!-- Add Reservation Status Button -->
                    <a href="{{ route('reservation.status.index') }}" class="btn btn-primary">Manage Reservations</a>

                    <!-- Add Register Resource Person Button -->
                    <a href="{{ route('resource-person.register.create') }}" class="btn btn-primary">Register Resource Person</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
