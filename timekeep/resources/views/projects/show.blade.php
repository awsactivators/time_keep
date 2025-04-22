@extends('layouts.app')

@section('content')
<h1>Project Details</h1>
<div class="card mb-4">
    <div class="card-body">
        <h3>{{ $project->name }}</h3>
        <p><strong>Description:</strong> {{ $project->description }}</p>
        <p><strong>Client:</strong> {{ $project->client_name }}</p>
        <p><strong>Project Type:</strong> {{ $project->project_type }}</p>
        <p><strong>Start Date:</strong> {{ $project->start_date }}</p>
        <p><strong>Due Date:</strong> {{ $project->due_date }}</p>
        <p><strong>Status:</strong> {{ $project->status }}</p>
        <p><strong>Price Per Hour:</strong> ${{ $project->price_per_hour }}</p>
        <p><strong>Notes:</strong> {{ $project->notes }}</p>
        <p><strong>Link:</strong> <a href="{{ $project->link }}" target="_blank">Visit</a></p>
    </div>
</div>

<h4>Associated Tasks</h4>
@if($project->tasks->count())
    @foreach ($project->tasks as $task)
        <div class="card mb-2">
            <div class="card-body">
                <h5>{{ $task->name }}</h5>
                <p><strong>Date:</strong> {{ $task->date }} | <strong>Status:</strong> {{ $task->status }}</p>
                <p><strong>Time:</strong> {{ $task->start_time }} - {{ $task->end_time }} ({{ $task->time_spent }} hrs)</p>
                <p><strong>Notes:</strong> {{ $task->notes }}</p>
                <p><strong>Link:</strong> <a href="{{ $task->link }}" target="_blank">View</a></p>
            </div>
        </div>
    @endforeach
@else
    <p>No tasks logged yet for this project.</p>
@endif
@endsection