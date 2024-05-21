@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Volunteer</h1>

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
    <form method="POST" action="{{ route('supervisor.store') }}">
        @csrf <!-- CSRF token for security -->

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <button type="submit" class="btn btn-success">Add Volunteer</button>
        <a href="{{ route('supervisor.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection