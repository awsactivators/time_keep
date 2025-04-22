{{-- @extends('layouts.app')

@section('content')
  <h1>{{ isset($project) ? 'Edit Project' : 'Create Project' }}</h1>
  <form action="{{ isset($project) ? route('projects.update', $project->id) : route('projects.store') }}" method="POST">
      @csrf
      @if (isset($project)) @method('PUT') @endif
      <div class="mb-3">
          <label class="form-label">Name</label>
          <input type="text" name="name" class="form-control" value="{{ $project->name ?? '' }}" required>
      </div>
      <div class="mb-3">
          <label class="form-label">Client</label>
          <input type="text" name="client_name" class="form-control" value="{{ $project->client_name ?? '' }}">
      </div>
      <div class="mb-3">
          <label class="form-label">Status</label>
          <select name="status" class="form-control">
              <option value="pending" {{ (isset($project) && $project->status == 'pending') ? 'selected' : '' }}>Pending</option>
              <option value="in-progress" {{ (isset($project) && $project->status == 'in-progress') ? 'selected' : '' }}>In Progress</option>
              <option value="completed" {{ (isset($project) && $project->status == 'completed') ? 'selected' : '' }}>Completed</option>
          </select>
      </div>
      <button class="btn btn-success" type="submit">{{ isset($project) ? 'Update' : 'Create' }}</button>
  </form>
@endsection --}}


@extends('layouts.app')

@section('content')
<h1>{{ isset($project) ? 'Edit Project' : 'Create Project' }}</h1>
<form action="{{ isset($project) ? route('projects.update', $project->id) : route('projects.store') }}" method="POST">
    @csrf
    @if (isset($project)) @method('PUT') @endif
    <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" name="name" class="form-control" value="{{ $project->name ?? '' }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea name="description" class="form-control">{{ $project->description ?? '' }}</textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Project Type</label>
        <input type="text" name="project_type" class="form-control" value="{{ $project->project_type ?? '' }}">
    </div>
    <div class="mb-3">
        <label class="form-label">Start Date</label>
        <input type="date" name="start_date" class="form-control" value="{{ $project->start_date ?? '' }}">
    </div>
    <div class="mb-3">
        <label class="form-label">Due Date</label>
        <input type="date" name="due_date" class="form-control" value="{{ $project->due_date ?? '' }}">
    </div>
    <div class="mb-3">
        <label class="form-label">Client</label>
        <input type="text" name="client_name" class="form-control" value="{{ $project->client_name ?? '' }}">
    </div>
    <div class="mb-3">
        <label class="form-label">Notes</label>
        <textarea name="notes" class="form-control">{{ $project->notes ?? '' }}</textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Project Link</label>
        <input type="url" name="link" class="form-control" value="{{ $project->link ?? '' }}">
    </div>
    <div class="mb-3">
        <label class="form-label">Price Per Hour</label>
        <input type="number" step="0.01" name="price_per_hour" class="form-control" value="{{ $project->price_per_hour ?? '' }}">
    </div>
    <div class="mb-3">
        <label class="form-label">Status</label>
        <select name="status" class="form-control">
            <option value="pending" {{ (isset($project) && $project->status == 'pending') ? 'selected' : '' }}>Pending</option>
            <option value="in-progress" {{ (isset($project) && $project->status == 'in-progress') ? 'selected' : '' }}>In Progress</option>
            <option value="completed" {{ (isset($project) && $project->status == 'completed') ? 'selected' : '' }}>Completed</option>
        </select>
    </div>
    <button class="btn btn-success" type="submit">{{ isset($project) ? 'Update' : 'Create' }}</button>
</form>
@endsection