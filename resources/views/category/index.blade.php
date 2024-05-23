@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Categories</h1>
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <a href="{{ route('category.create') }}" class="btn btn-success">Add New Category</a>
        <a href="{{ route('books.create') }}" class="btn btn-success">Add New Book</a>
    </div>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories as $index => $category)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->description }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="3">No categories found</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
