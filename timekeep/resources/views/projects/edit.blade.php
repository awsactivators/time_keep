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
@endsection