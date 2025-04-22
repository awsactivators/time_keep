@extends('layouts.app')

@section('content')
<h1>Log Work Session for Task: {{ $task->name }}</h1>
<form action="{{ route('task-sessions.store', $task->id) }}" method="POST">
    @csrf
    <div class="mb-3">
        <label class="form-label">Date</label>
        <input type="date" name="date" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Start Time</label>
        <input type="time" name="start_time" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">End Time</label>
        <input type="time" name="end_time" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Notes</label>
        <textarea name="notes" class="form-control" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-success">Log Session</button>
</form>
@endsection