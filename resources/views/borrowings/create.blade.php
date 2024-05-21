@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create New Borrowing Record</h1>
    <form method="POST" action="{{ route('borrowings.store') }}">
        @csrf
        <div>
            <label for="book_id">Book:</label>
            <select name="book_id" id="book_id" required>
                @foreach($books as $book)
                    <option value="{{ $book->id }}">{{ $book->title }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="member_id">Member:</label>
            <select name="member_id" id="member_id" required>
                @foreach($members as $member)
                    <option value="{{ $member->id }}">{{ $member->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="borrow_date">Borrow Date:</label>
            <input type="date" name="borrow_date" id="borrow_date" required>
        </div>
        <div>
            <label for="return_date">Return Date (optional):</label>
            <input type="date" name="return_date" id="return_date">
        </div>
        <button type="submit">Create Record</button>
    </form>
</div>
@endsection