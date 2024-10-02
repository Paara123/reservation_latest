@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Resource Person') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('resource-person.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="resource_person_name">Name</label>
                            <input type="text" class="form-control" id="resource_person_name" name="resource_person_name" required>
                        </div>

                        <div class="form-group">
                            <label for="resource_person_contact_no">Contact Number</label>
                            <input type="tel" class="form-control" id="resource_person_contact_no" name="resource_person_contact_no" required maxlength="10" pattern="\d{10}" title="Please enter exactly 10 digits" inputmode="numeric">
                        </div>

                        <div class="form-group">
                            <label for="resource_person_email">Email</label>
                            <input type="email" class="form-control" id="resource_person_email" name="resource_person_email" required>
                        </div>

                        <div class="form-group">
                            <label for="resource_person_address">Address</label>
                            <textarea class="form-control" id="resource_person_address" name="resource_person_address" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="expertise_fields">Expertise Fields</label>
                            <textarea class="form-control" id="expertise_fields" name="expertise_fields" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="institute">Institute</label>
                            <input type="text" class="form-control" id="institute" name="institute" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Add Resource Person</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
