@extends('layouts.app')

@section('content')
<h1 class="mb-4">Dashboard</h1>

<form method="GET" action="{{ route('dashboard') }}" class="row g-3 mb-4">
    <div class="col-md-3">
        <select name="type" class="form-select">
            <option value="">Filter by Type</option>
            <option value="project" {{ request('type') == 'project' ? 'selected' : '' }}>Project</option>
            <option value="task" {{ request('type') == 'task' ? 'selected' : '' }}>Task</option>
        </select>
    </div>
    <div class="col-md-3">
        <select name="status" class="form-select">
            <option value="">Filter by Status</option>
            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="in-progress" {{ request('status') == 'in-progress' ? 'selected' : '' }}>In Progress</option>
            <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
        </select>
    </div>
    <div class="col-md-3">
        <input type="date" name="date" class="form-control" value="{{ request('date') }}">
    </div>
    <div class="col-md-3">
        <button class="btn btn-primary w-100">Apply Filters</button>
    </div>
</form>

@if($data->isEmpty())
    <p>No results found.</p>
@else
    @foreach($data as $item)
        <div class="card mb-3">
            <div class="card-body">
                <h5>{{ $item->name }}</h5>
                <p><strong>Status:</strong> {{ $item->status }}</p>
                <p><strong>Date:</strong> {{ $type == 'task' ? $item->date : $item->due_date }}</p>
                @if($type == 'project')
                    <p><strong>Client:</strong> {{ $item->client_name }}</p>
                @else
                    <p><strong>Notes:</strong> {{ $item->notes }}</p>
                @endif
            </div>
        </div>
    @endforeach
@endif
@endsection

