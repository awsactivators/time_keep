@extends('layouts.app')

@section('content')
<h1>Task Details</h1>
<div class="card mb-4">
    <div class="card-body">
        <h3>{{ $task->name }}</h3>
        <p><strong>Project:</strong> {{ $task->project->name ?? 'N/A' }}</p>
        <p><strong>Description:</strong> {{ $task->description }}</p>
        <p><strong>Date:</strong> {{ $task->date }}</p>
        <p><strong>Time:</strong> {{ $task->start_time }} - {{ $task->end_time }}</p>
        <p><strong>Status:</strong> {{ $task->status }}</p>
        <p><strong>Notes:</strong> {{ $task->notes }}</p>
        <p><strong>Link:</strong> <a href="{{ $task->link }}" target="_blank">Visit</a></p>
        <p><strong>Total Session Time:</strong> {{ $task->total_session_hours }} hrs</p>
    </div>
</div>

<h4>Work Sessions</h4>
@if($task->sessions->count())
    @foreach ($task->sessions as $session)
        <div class="card mb-2">
            <div class="card-body">
                <p><strong>Date:</strong> {{ $session->date }}</p>
                <p><strong>Start:</strong> {{ $session->start_time }} | <strong>End:</strong> {{ $session->end_time }}</p>
                <p><strong>Time Spent:</strong> {{ $session->time_spent }} hrs</p>
                <p><strong>Notes:</strong> {{ $session->notes }}</p>
            </div>
        </div>
    @endforeach
@else
    <p>No sessions logged for this task.</p>
@endif

<a href="{{ route('tasks.index') }}" class="btn btn-secondary mt-3">Back to Task List</a>

@endsection

