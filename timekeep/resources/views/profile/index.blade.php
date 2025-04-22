@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">User Profile</h2>
    <div class="card p-4">
        <p><strong>Name:</strong> {{ $user->name }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <p><strong>Role:</strong> {{ $user->role }}</p>
        @if($user->photo_path)
            <img src="{{ asset('storage/' . $user->photo_path) }}" width="100" class="rounded mt-2">
        @endif
    </div>
</div>
@endsection
