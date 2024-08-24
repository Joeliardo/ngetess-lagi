@extends('layout.navbar')

@section('title', 'Home')
@section('activeHome', 'active')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="container">
        
        <h3>Notifications</h3>
        <div class="alert alert-info">
            <ul class="list-unstyled mb-0">
                @forelse (Auth::user()->notifications as $notification)
                    <li>
                        {{ $notification->data['message'] }}
                        <a href="{{ route('notifications.destroy', $notification->id) }}" class="btn btn-danger btn-sm ms-2"
                            onclick="event.preventDefault(); document.getElementById('delete-form-{{ $notification->id }}').submit();">
                            <i class="icon-close"></i>
                        </a>

                        <form id="delete-form-{{ $notification->id }}"
                            action="{{ route('notifications.destroy', $notification->id) }}" method="POST"
                            style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </li>
                @empty
                    <li>No new notifications</li>
                @endforelse
            </ul>
        </div>
    </div>
    <div class="container my-5">
        <h1 class="display-4 text-center mb-4">Find Your Friends</h1>
        
        <div class="row row-cols-1 row-cols-md-2 g-4">
            @foreach ($dataUser as $user)
            <div class="col">
                <div class="card h-100 shadow-lg border-0">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <a href="/login">
                                <img src="{{ asset($user->profile_path) }}" class="img-fluid rounded-start h-100" alt="User Image">
                            </a>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{ $user->name }}</h5>
                                <p class="card-text">{{ $user->hobby }}</p>
                                <p class="card-text">
                                    <small class="text-muted">Last updated 5 mins ago</small>
                                </p>
                            </div>
                            <div class="card-footer bg-transparent border-0">
                            <form method="POST" action="{{ route('friend-request.store') }}" class="mt-auto">
                                @csrf
                                <input type="hidden" name="receiver_id" value="{{ $user->id }}">
                                <button type="submit" class="btn btn-outline-primary">
                                    <i class="bi bi-hand-thumbs-up"></i>
                                </button>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            
        </div>
    </div>
@endsection
