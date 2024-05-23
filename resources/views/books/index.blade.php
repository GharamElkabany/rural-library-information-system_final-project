@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Books</h1>
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <a href="{{ route('books.create') }}" class="btn btn-success">Add New Book</a>
    </div>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Publisher</th>
                <th>Published Year</th>
                <th>Category</th>
            </tr>
        </thead>
        <tbody>
            @forelse($books as $book)
            <tr>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->publisher_name }}</td>
                <td>{{ $book->published_year }}</td>
                <td>{{ $book->category->name }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="5">No books found</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
