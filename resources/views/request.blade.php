@extends('layout.navbar')

@section('title', 'Request')
@section('activeRequest', 'active')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="container">
        <div class="row">
            @foreach ($friendRequest as $user)
                <div class="col-md-6 mb-4">
                    <div class="card h-100 shadow-lg border-0">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <a href="#">
                                    <img src="{{ asset($user->profile_path) }}" 
                                         class="img-fluid rounded-start h-100" 
                                         alt="{{ $user->name }}'s profile">
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
                                    <form method="POST" action="{{ route('friend.store') }}" class="d-inline-block">
                                        @csrf
                                        <input type="hidden" name="request_id" value="{{ $user->request_id }}">
                                        <input type="hidden" name="friend_id" value="{{ $user->id }}">
                                        <button type="submit" class="btn btn-outline-success">
                                            <i class="fas fa-thumbs-up"></i>
                                        </button>
                                    </form>
                                    <form method="POST" action="{{ route('friend-request.destroy', $user->request_id) }}" 
                                          class="d-inline-block">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-outline-danger">
                                            <i class="fas fa-thumbs-down"></i>
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
