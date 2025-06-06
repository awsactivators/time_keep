@extends('layouts.app')

@section('content')
<h1>Log Work Session for Task: {{ $task->name }}</h1>
<form action="{{ isset($session) 
? route('task-sessions.update', [$task->id, $session->id]) 
: route('task-sessions.store', $task->id) }}" 
method="POST">
    @csrf
    @if (isset($session)) @method('PUT') @endif
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
    <a href="{{ route('task-sessions.index', $task->id) }}" class="btn btn-secondary mt-3">Back to Sessions</a>

</form>
@endsection