@extends('layouts.app')

@section('content')
<h1>My Projects</h1>
<a href="{{ route('projects.create') }}" class="btn btn-primary mb-3">Create New Project</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Client</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($projects as $project)
            <tr>
                <td>{{ $project->name }}</td>
                <td>{{ $project->client_name }}</td>
                <td>{{ $project->status }}</td>
                <td>
                    <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display:inline-block">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this project?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection