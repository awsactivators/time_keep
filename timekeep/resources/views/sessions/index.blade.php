@extends('layouts.app')

@section('content')
<h1>Sessions for Task: {{ $task->name }}</h1>
<a href="{{ route('task-sessions.create', $task->id) }}" class="btn btn-primary mb-3">Add Session</a>

@if ($sessions->count())
    @foreach ($sessions as $session)
        <div class="card mb-3">
            <div class="card-body">
                <p><strong>Date:</strong> {{ $session->date }}</p>
                <p><strong>Start:</strong> {{ $session->start_time }} | <strong>End:</strong> {{ $session->end_time }}</p>
                <p><strong>Time Spent:</strong> {{ $session->time_spent }} hrs</p>
                <p><strong>Notes:</strong> {{ $session->notes }}</p>
                <a href="{{ route('task-sessions.edit', [$task->id, $session->id]) }}" class="btn btn-sm btn-secondary">Edit</a>

                <form action="{{ route('task-sessions.destroy', [$task->id, $session->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this session?')">Delete</button>
                </form>
            </div>
        </div>
    @endforeach
@else
    <p>No sessions logged yet for this task.</p>
@endif

<a href="{{ route('tasks.show', $task->id) }}" class="btn btn-secondary mt-3">Back to Task Details</a>

@endsection
