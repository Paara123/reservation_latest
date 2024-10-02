@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Resource Person') }}</div>

                <div class="card-body">
                <form action="{{ route('resource-person.update', $resourcePerson->id) }}" method="POST">
                @csrf
                @method('PUT')

                        <div class="form-group">
                            <label for="resource_person_name">Name</label>
                            <input type="text" class="form-control" id="resource_person_name" name="resource_person_name" value="{{ $resourcePerson->resource_person_name }}" required>
                        </div>

                        <div class="form-group">
                            <label for="resource_person_contact_no">Contact Number</label>
                            <input type="tel" class="form-control" id="resource_person_contact_no" name="resource_person_contact_no" value="{{ $resourcePerson->resource_person_contact_no }}" required maxlength="10" pattern="\d{10}" title="Please enter exactly 10 digits" inputmode="numeric">
                        </div>

                        <div class="form-group">
                            <label for="resource_person_email">Email</label>
                            <input type="email" class="form-control" id="resource_person_email" name="resource_person_email" value="{{ $resourcePerson->resource_person_email }}" required>
                        </div>

                        <div class="form-group">
                            <label for="resource_person_address">Address</label>
                            <textarea class="form-control" id="resource_person_address" name="resource_person_address" required>{{ $resourcePerson->resource_person_address }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="expertise_fields">Expertise Fields</label>
                            <textarea class="form-control" id="expertise_fields" name="expertise_fields" required>{{ $resourcePerson->expertise_fields }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="institute">Institute</label>
                            <input type="text" class="form-control" id="institute" name="institute" value="{{ $resourcePerson->institute }}" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Update Resource Person</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
