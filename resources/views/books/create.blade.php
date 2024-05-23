@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Book</h1>
    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="author">Author</label>
            <input type="text" name="author" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="publisher_name">Publisher Name</label>
            <input type="text" name="publisher_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="published_year">Published Year</label>
            <input type="number" name="published_year" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="category_id">Category</label>
            <div style="display: flex; align-items: center;">
                <select name="category_id" class="form-control" required>
                    <option value="" disabled selected>Select a category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                <a href="{{ route('category.create') }}" class="btn btn-warning btn-sm m-2">Add New Category</a>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Add Book</button>
    </form>
</div>
@endsection
