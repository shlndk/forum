@extends('layouts.app')

@section('content')
    @include('layouts.other.nav')
    <div class="container mt-3 ">
        <div class="card shadow-lg p-4">
            @if($posts->count() == 0)
                <p class="text-muted">Ничего не найдено</p>
            @endif
            @foreach($posts as $post)

                <div class="card-body">
                    <h4 class="text-muted">@ {{ $post->username }}</h4>
                    <h1 class="card-title">{{ $post->title }}</h1>
                    <p class="card-text lead">{{ $post->content }}</p>
                    <hr>
                </div>
                <form action="{{ route('removeFav', $post) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Удалить из избранного</button>
                </form>
                <hr>
            @endforeach

        </div>
    </div>
@endsection
