@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Borrowing Records</h1>
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <form action="{{ route('borrowings.index') }}" method="GET">
            <input type="text" name="search" placeholder="Enter Book ID or Member's IC No" style="width: 230px;" required>
            <button type="submit">Search</button>
        </form>

        <div>
            <a href="{{ route('borrowings.create') }}" class="btn btn-success" style="margin-right: 10px;">Add New Borrowing</a>
            <a href="{{ route('volunteer.index') }}" class="btn btn-secondary">Go Back</a>
        </div>
    </div>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Book Title</th>
                <th>Member Name</th>
                <th>Borrow Date</th>
                <th>Return Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($borrowings as $borrowing)
            <tr>
                <td>{{ $borrowing->book->title }}</td>
                <td>{{ $borrowing->member->name }}</td>
                <td>{{ $borrowing->borrow_date }}</td>
                <td>{{ $borrowing->return_date ?? 'Not Returned' }}</td>
                <td>
                    <a href="{{ route('borrowings.edit', $borrowing) }}" class="btn btn-warning">Edit</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5">No borrowing records found</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    {!! $borrowings->links()!!}
</div>
@endsection
