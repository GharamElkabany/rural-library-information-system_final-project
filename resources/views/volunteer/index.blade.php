@extends('layouts.app')

@section('content')
<div class='container'>
    <div class='card-header'>
        <div class="row">
            <div class="col">
                <h1>List of Members</h1>
            </div>
            <div class="col-auto">
                @can('register-member')  <!-- Ensures only volunteers can see this button -->
                <div class="dropdown" style="display: inline-block;">
                    <a href="{{ route('volunteer.create') }}" class="btn btn-success ml-3">Add New Member</a>
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        View Options
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{ route('books.index') }}">Books View</a>
                        <a class="dropdown-item" href="{{ route('borrowings.index') }}">Borrowing View</a>
                    </div>
                </div>
                @endcan
                
                @can('isSupervisor')
                <div style="text-align: right;">
                    <a href="{{ route('supervisor.index') }}" class="btn btn-secondary">Go Back</a>
                </div>
                @endcan    
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class='table'>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>IC-no</th>
                    <th>Contact Info</th>
                </tr>
            </thead>
            <tbody>
                @forelse($members as $index => $member)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $member->name }}</td>
                        <td>{{ $member->ic_no }}</td>
                        <td>{{ $member->contact_info }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">No members found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection