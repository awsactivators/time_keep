@extends('layouts.app')

@section('content')
<h1>My Tasks</h1>
<a href="{{ route('tasks.create') }}" class="btn btn-primary mb-3">Log New Task</a>
<div class="row">
    @foreach ($tasks as $task)
    <div class="col-md-6 mb-4">
        <div class="card shadow-sm">
            <div class="card-body">
              <a href="{{ route('task-sessions.index', $task->id) }}" class="btn btn-info btn-sm">View Sessions</a>
                <h5 class="card-title">{{ $task->name }}</h5>
                <p><strong>Project:</strong> {{ $task->project->name ?? 'N/A' }}</p>
                <p><strong>Description:</strong> {{ $task->description }}</p>
                <p><strong>Date:</strong> {{ $task->date }}</p>
                {{-- <p><strong>Time:</strong> {{ $task->start_time }} - {{ $task->end_time }}</p>
                <p><strong>Time Spent:</strong> {{ $task->time_spent }} hrs</p> --}}
                <p><strong>Status:</strong> {{ $task->status }}</p>
                <p><strong>Notes:</strong> {{ $task->notes }}</p>
                <p><strong>Link:</strong> <a href="{{ $task->link }}" target="_blank">View</a></p>
                <div class="alert alert-info p-2">
                  <strong>Total Logged Time:</strong> {{ $task->total_session_hours }} hrs
                </div>

                <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-sm btn-info">View Details</a>
              
                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <button class="btn btn-danger btn-sm" 
                    onclick="openDeleteModal('{{ route('tasks.destroy', $task->id) }}')">
                    Delete
                </button>

            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection

<!-- Delete Confirmation Modal -->
@push('scripts')

<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form id="deleteForm" method="POST">
      @csrf
      @method('DELETE')
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Are you sure you want to delete this item? This action cannot be undone.
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-danger">Yes, Delete</button>
        </div>
      </div>
    </form>
  </div>
</div>

<script>
  function openDeleteModal(actionUrl) {
      const form = document.getElementById('deleteForm');
      form.action = actionUrl;

      const modalEl = document.getElementById('deleteModal');
      const modal = bootstrap.Modal.getOrCreateInstance(modalEl);
      modal.show();
  }
</script>
@endpush
