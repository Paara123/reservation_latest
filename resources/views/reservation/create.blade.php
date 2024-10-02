@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Booking Your Reservation Details</h1>

    <form method="POST" action="{{ route('reservation.store') }}">
        @csrf
        <div class="mb-3">
            <label for="reservation_date_from" class="form-label">Reservation Date From</label>
            <input type="date" class="form-control" id="reservation_date_from" name="reservation_date_from" required>
        </div>

        <div class="mb-3">
            <label for="reservation_date_to" class="form-label">Reservation Date To</label>
            <input type="date" class="form-control" id="reservation_date_to" name="reservation_date_to" required>
        </div>

        <div class="mb-3">
            <label for="reservation_time_slot" class="form-label">Reservation Time Slot</label>
            <select class="form-control" id="reservation_time_slot" name="reservation_time_slot" required>
                <option value="morning session">Morning Session</option>
                <option value="evening session">Evening Session</option>
                <option value="whole day (8 – 4 pm)">Whole Day (8 – 4 pm)</option>
                <option value="Full day (8 – 6 pm)">Full Day (8 – 6 pm)</option>
                <option value="night time">Night Time</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="reservation_location" class="form-label">Reservation Location</label>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="NAICC Computer Laboratory" id="reservation_location1" name="reservation_location[]">
                <label class="form-check-label" for="reservation_location1">NAICC Computer Laboratory</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="NAICC Conference Hall" id="reservation_location2" name="reservation_location[]">
                <label class="form-check-label" for="reservation_location2">NAICC Conference Hall</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Roof Top for Lunch/ Refreshment or Other" id="reservation_location3" name="reservation_location[]">
                <label class="form-check-label" for="reservation_location3">Roof Top for Lunch/ Refreshment or Other</label>
            </div>
        </div>

        <div class="mb-3">
            <label for="program_name" class="form-label">Program Name</label>
            <input type="text" class="form-control" id="program_name" name="program_name" required>
        </div>

        <div class="mb-3">
            <label for="number_of_participants" class="form-label">Number of Participants</label>
            <input type="number" class="form-control" id="number_of_participants" name="number_of_participants" required>
        </div>

        <div class="mb-3">
            <label for="payment_method" class="form-label">Payment Method</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" value="none" id="payment_method0" name="payment_method" required>
                <label class="form-check-label" for="payment_method0">None</label>
            </div><div class="form-check">
                <input class="form-check-input" type="radio" value="on date" id="payment_method1" name="payment_method" required>
                <label class="form-check-label" for="payment_method1">On Date</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" value="before the program" id="payment_method2" name="payment_method" required>
                <label class="form-check-label" for="payment_method2">Before the Program</label>
            </div>
        </div>

        <div class="mb-3">
            <label for="contact_person_name" class="form-label">Contact Person Name</label>
            <input type="text" class="form-control" id="contact_person_name" name="contact_person_name" required>
        </div>

        <div class="mb-3">
            <label for="contact_person_email" class="form-label">Contact Person Email</label>
            <input type="email" class="form-control" id="contact_person_email" name="contact_person_email" required>
        </div>

        <div class="mb-3">
            <label for="contact_person_phone" class="form-label">Contact Person Phone</label>
            <input type="text" class="form-control" id="contact_person_phone" name="contact_person_phone" required>
        </div>

        <div class="mb-3">
            <label for="contact_person_address" class="form-label">Contact Person Address</label>
            <input type="text" class="form-control" id="contact_person_address" name="contact_person_address" required>
        </div>

        <h2>List of Resource Persons in NAICC</h2>

        <div class="mb-3 table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Resource Person Name</th>
                        <th>Expertise Field</th>
                        <th>Do you wish to reserve our NAICC resource person</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($resourcePersons as $resourcePerson)
                        <tr>
                            <td>{{ $resourcePerson->resource_person_name }}</td>
                            <td>{{ $resourcePerson->expertise_fields }}</td>
                            <td>
                                <input class="form-check-input" type="checkbox" value="{{ $resourcePerson->resource_person_id }}" name="resource_persons[]">
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            if ("{{ session('success') }}") {
                alert("{{ session('success') }}");
                window.location.href = "{{ route('home') }}";
            }
        });
    </script>
@endsection
