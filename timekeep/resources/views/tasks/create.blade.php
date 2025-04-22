{{-- @extends('layouts.app')

@section('content')
<h1>{{ isset($task) ? 'Edit Task' : 'Log New Task' }}</h1>
<form action="{{ isset($task) ? route('tasks.update', $task->id) : route('tasks.store') }}" method="POST">
    @csrf
    @if (isset($task)) @method('PUT') @endif
    <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" name="name" class="form-control" value="{{ $task->name ?? '' }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Project</label>
        <select name="project_id" class="form-control" required>
            @foreach ($projects as $project)
                <option value="{{ $project->id }}" {{ (isset($task) && $task->project_id == $project->id) ? 'selected' : '' }}>{{ $project->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Date</label>
        <input type="date" name="date" class="form-control" value="{{ $task->date ?? '' }}">
    </div>
    <div class="mb-3">
        <label class="form-label">Start Time</label>
        <input type="time" name="start_time" class="form-control" value="{{ $task->start_time ?? '' }}">
    </div>
    <div class="mb-3">
        <label class="form-label">End Time</label>
        <input type="time" name="end_time" class="form-control" value="{{ $task->end_time ?? '' }}">
    </div>
    <div class="mb-3">
        <label class="form-label">Status</label>
        <select name="status" class="form-control">
            <option value="incomplete" {{ (isset($task) && $task->status == 'incomplete') ? 'selected' : '' }}>Incomplete</option>
            <option value="complete" {{ (isset($task) && $task->status == 'complete') ? 'selected' : '' }}>Complete</option>
        </select>
    </div>
    <button class="btn btn-success" type="submit">{{ isset($task) ? 'Update' : 'Save Task' }}</button>
</form>
@endsection --}}


@extends('layouts.app')

@section('content')
<h1>{{ isset($task) ? 'Edit Task' : 'Log New Task' }}</h1>
<form action="{{ isset($task) ? route('tasks.update', $task->id) : route('tasks.store') }}" method="POST">
    @csrf
    @if (isset($task)) @method('PUT') @endif
    <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" name="name" class="form-control" value="{{ $task->name ?? '' }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea name="description" class="form-control">{{ $task->description ?? '' }}</textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Project</label>
        <select name="project_id" class="form-control" required>
            @foreach ($projects as $project)
                <option value="{{ $project->id }}" {{ (isset($task) && $task->project_id == $project->id) ? 'selected' : '' }}>{{ $project->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Date</label>
        <input type="date" name="date" class="form-control" value="{{ $task->date ?? '' }}">
    </div>
    <div class="mb-3">
        <label class="form-label">Start Time</label>
        <input type="time" name="start_time" class="form-control" value="{{ $task->start_time ?? '' }}">
    </div>
    <div class="mb-3">
        <label class="form-label">End Time</label>
        <input type="time" name="end_time" class="form-control" value="{{ $task->end_time ?? '' }}">
    </div>
    <div class="mb-3">
        <label class="form-label">Notes</label>
        <textarea name="notes" class="form-control">{{ $task->notes ?? '' }}</textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Link</label>
        <input type="url" name="link" class="form-control" value="{{ $task->link ?? '' }}">
    </div>
    <div class="mb-3">
        <label class="form-label">Status</label>
        <select name="status" class="form-control">
            <option value="incomplete" {{ (isset($task) && $task->status == 'incomplete') ? 'selected' : '' }}>Incomplete</option>
            <option value="complete" {{ (isset($task) && $task->status == 'complete') ? 'selected' : '' }}>Complete</option>
        </select>
    </div>
    <button class="btn btn-success" type="submit">{{ isset($task) ? 'Update' : 'Save Task' }}</button>
</form>
@endsection
