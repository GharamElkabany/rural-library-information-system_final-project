@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Borrowing Record</h1>

    <form action="{{ route('borrowings.update', $borrowing->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="return_date">Return Date:</label>
            <input type="date" class="form-control" name="return_date" id="return_date" value="{{ $borrowing->return_date ?? old('return_date') }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Return Date</button>
    </form>
</div>
@endsection
