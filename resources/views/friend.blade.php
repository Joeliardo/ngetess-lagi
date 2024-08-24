@extends('layout.navbar')

@section('title', 'Friend')
@section('activeFriend', 'active')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="container">
        <div class="row">
            @foreach ($dataFriend as $user)
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
                                    <p class="card-text">{{ $user->fields_of_work }}</p>
                                    <p class="card-text">
                                        <small class="text-muted">Last updated 5 mins ago</small>
                                    </p>
                                </div>
                                <div class="card-footer bg-transparent border-0">
                                    <a href="{{ route('message.show', $user->id) }}"
                                       class="btn btn-outline-primary">
                                        <i class="fas fa-envelope"></i> Message
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
