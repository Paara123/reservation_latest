@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    {{ __('Resource Person Management') }}
                    <!-- Search Form -->
                    <form action="{{ route('resource-person.index') }}" method="GET" class="form-inline">
                        <input type="text" name="search" class="form-control mr-sm-2" placeholder="Search" aria-label="Search" value="{{ request('search') }}">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- Add Resource Person Button -->
                    <a href="{{ route('resource-person.create') }}" class="btn btn-primary mb-3">Add Resource Person Information</a>
                    <a href="{{ route('admin.home') }}" class="btn btn-secondary mb-3">Back</a>

                    <!-- Resource Person Table -->
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Contact Number</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Expertise Fields</th>
                                <th>Institute</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($resourcePersons as $person)
                            <tr>
                                <td>{{ $person->resource_person_id }}</td>
                                <td>{{ $person->resource_person_name }}</td>
                                <td>{{ $person->resource_person_contact_no }}</td>
                                <td>{{ $person->resource_person_email }}</td>
                                <td>{{ $person->resource_person_address }}</td>
                                <td>{{ $person->expertise_fields }}</td>
                                <td>{{ $person->institute }}</td>
                                <td>
                                <a href="{{ route('resource-person.edit', $person->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form action="{{ route('resource-person.destroy', $person->id) }}" method="POST" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8">No Resource Persons found.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <!-- Pagination Links -->
                    <div class="d-flex justify-content-center">
                        {{ $resourcePersons->appends(['search' => request('search')])->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection