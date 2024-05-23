@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Member</h1>

    <!-- Display errors if there are any form validation failures -->
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <!-- Form for creating a new volunteer -->
    <form method="POST" action="{{ route('volunteer.store') }}">
        @csrf <!-- CSRF token for security -->

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="mb-3">
            <label for="ic_no" class="form-label">IC Number</label>
            <input type="text" class="form-control" id="ic_no" name="ic_no" required>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control" id="address" name="address" required>
        </div>

        <div class="mb-3">
            <label for="number" class="form-label">Contact Info</label>
            <input type="number" class="form-control" id="contact_info" name="contact_info" required>
        </div>

        <button type="submit" class="btn btn-success">Add Member</button>
        <a href="{{ route('volunteer.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection