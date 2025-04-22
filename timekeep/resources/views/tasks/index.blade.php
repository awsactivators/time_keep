{{-- @extends('layouts.app')

@section('content')
<h1>My Tasks</h1>
<a href="{{ route('tasks.create') }}" class="btn btn-primary mb-3">Log New Task</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Project</th>
            <th>Date</th>
            <th>Time Spent</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tasks as $task)
            <tr>
                <td>{{ $task->name }}</td>
                <td>{{ $task->project->name ?? 'N/A' }}</td>
                <td>{{ $task->date }}</td>
                <td>{{ $task->time_spent }} hrs</td>
                <td>{{ $task->status }}</td>
                <td>
                    <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline-block">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this task?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection --}}

@extends('layouts.app')

@section('content')
<h1>My Tasks</h1>
<a href="{{ route('tasks.create') }}" class="btn btn-primary mb-3">Log New Task</a>
<div class="row">
    @foreach ($tasks as $task)
    <div class="col-md-6 mb-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <h5 class="card-title">{{ $task->name }}</h5>
                <p><strong>Project:</strong> {{ $task->project->name ?? 'N/A' }}</p>
                <p><strong>Description:</strong> {{ $task->description }}</p>
                <p><strong>Date:</strong> {{ $task->date }}</p>
                <p><strong>Time:</strong> {{ $task->start_time }} - {{ $task->end_time }}</p>
                <p><strong>Time Spent:</strong> {{ $task->time_spent }} hrs</p>
                <p><strong>Status:</strong> {{ $task->status }}</p>
                <p><strong>Notes:</strong> {{ $task->notes }}</p>
                <p><strong>Link:</strong> <a href="{{ $task->link }}" target="_blank">View</a></p>
                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline-block">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this task?')">Delete</button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection