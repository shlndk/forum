@extends('layouts.app')

@section('content')
    @include('layouts.other.nav')
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="container mt-5">
        <div class="card shadow-lg p-4">
            <div class="card-body">
                <h4 class="text-muted">@ {{ $post->username }}</h4>
                <h1 class="card-title">{{ $post->title }}</h1>
                <p class="card-text lead">{{ $post->content }}</p>
                <hr>
                <div class="d-flex align-items-center">
                    <form action="{{ route('addFav', $post) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-outline-secondary me-2">
                            <i class="bi bi-heart"></i> Add to favorites
                        </button>
                    </form>
                    @auth
                        <a href="{{ route('showComment', $post) }}">
                            <button type="submit" class="btn btn-outline-secondary me-2">
                                <i class="bi bi-chat"></i> Comment
                            </button>
                        </a>
                    @endauth
                    <a href="javascript:history.back();" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left"></i> Back to search
                    </a>
                </div>
                @guest
                    <div>
                        To comment on a post, you need to <a href="{{route('login')}}"
                                                             class="fw-bold text-decoration-none ">login</a>.
                    </div>
                @endguest
            </div>

            <h5>Comments ({{ $post->comments->count() }})</h5>

            @foreach($post->comments as $comment)
                <div class="card mb-2">
                    <div class="card-body">
                        <strong>{{ $comment->user->name }}</strong>
                        <p>{{ $comment->content }}</p>
                        <form action="{{ route('destroyComment', $comment->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">
                                Delete
                            </button>
                            <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
