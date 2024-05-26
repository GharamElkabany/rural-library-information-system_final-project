@extends('layouts.app')

@section('content')
<div class='container'>
    <div class='card-header'>
        <div class="row">
            <div class="col">
                <h1>List of Volunteers</h1>
            </div>
            @can('isSupervisor')  <!-- Ensures only supervisors can see this button -->
            <div class="col-auto">
                <a href="{{ route('supervisor.create') }}" class="btn btn-success">Add New Volunteer</a>
            </div>
            <div class="col-auto">
                <a href="{{ route('volunteer.index') }}" class="btn btn-success">View Members</a>
            </div>
            @endcan
        </div>
    </div>
    <div class="card-body">
        <table class='table'>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @forelse($volunteers as $index => $volunteer)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $volunteer->name }}</td>
                        <td>{{ $volunteer->email }}</td>
                    </tr>
                @empty
                    <tr>
                       
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection