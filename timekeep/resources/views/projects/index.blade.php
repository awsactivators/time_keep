@extends('layouts.app')

@section('content')
<h1>My Projects</h1>
<a href="{{ route('projects.create') }}" class="btn btn-primary mb-3">Create New Project</a>

<div class="row">
    @foreach ($projects as $project)
    <div class="col-md-6 mb-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <h5 class="card-title">{{ $project->name }}</h5>
                <p><strong>Client:</strong> {{ $project->client_name }}</p>
                <p><strong>Status:</strong> {{ $project->status }}</p>
                <p><strong>Type:</strong> {{ $project->project_type }}</p>
                <p><strong>Start Date:</strong> {{ $project->start_date }}</p>
                <p><strong>Due Date:</strong> {{ $project->due_date }}</p>
                <p><strong>Price/Hour:</strong> ${{ $project->price_per_hour }}</p>
                <p><strong>Notes:</strong> {{ $project->notes }}</p>
                <p><strong>Link:</strong> <a href="{{ $project->link }}" target="_blank">View</a></p>

                <a href="{{ route('projects.show', $project->id) }}" class="btn btn-info btn-sm">View</a>
                <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display:inline-block">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this project?')">Delete</button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection