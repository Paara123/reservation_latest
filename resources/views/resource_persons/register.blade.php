@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register Resource Person') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('resource-person.register.store') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="resource_person_name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="resource_person_name" type="text" class="form-control @error('resource_person_name') is-invalid @enderror" name="resource_person_name" value="{{ old('resource_person_name') }}" required autofocus>

                                @error('resource_person_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="resource_person_email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="resource_person_email" type="email" class="form-control @error('resource_person_email') is-invalid @enderror" name="resource_person_email" value="{{ old('resource_person_email') }}" required>

                                @error('resource_person_email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="resource_person_contact_no" class="col-md-4 col-form-label text-md-end">{{ __('Contact No') }}</label>

                            <div class="col-md-6">
                                <input id="resource_person_contact_no" type="text" class="form-control @error('resource_person_contact_no') is-invalid @enderror" name="resource_person_contact_no" value="{{ old('resource_person_contact_no') }}" required>

                                @error('resource_person_contact_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="resource_person_address" class="col-md-4 col-form-label text-md-end">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <textarea id="resource_person_address" class="form-control @error('resource_person_address') is-invalid @enderror" name="resource_person_address" required>{{ old('resource_person_address') }}</textarea>

                                @error('resource_person_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="expertise_fields" class="col-md-4 col-form-label text-md-end">{{ __('Expertise Fields') }}</label>

                            <div class="col-md-6">
                                <textarea id="expertise_fields" class="form-control @error('expertise_fields') is-invalid @enderror" name="expertise_fields" required>{{ old('expertise_fields') }}</textarea>

                                @error('expertise_fields')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="institute" class="col-md-4 col-form-label text-md-end">{{ __('Institute') }}</label>

                            <div class="col-md-6">
                                <input id="institute" type="text" class="form-control @error('institute') is-invalid @enderror" name="institute" value="{{ old('institute') }}" required>

                                @error('institute')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register Resource Person') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
