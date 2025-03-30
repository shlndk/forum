@extends('layouts.app')


@section('content')
    @include('layouts.other.nav')
    <div class="container mt-3 ">
        <div class="card shadow-lg p-4">
            @if($comments->count() == 0)
                <p class="text-muted">Nothing found</p>
            @endif
            @foreach($comments as $comment)

                <div class="card-body">
                    <h3 class="text-muted">{{ $comment->content }}</h3>
                    <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                    <hr>
                </div>
{{--                <form action="{{ route('removeFav', $post) }}" method="POST" class="d-inline">--}}
{{--                    @csrf--}}
{{--                    @method('DELETE')--}}
{{--                    <button type="submit" class="btn btn-danger">Удалить из избранного</button>--}}
{{--                </form>--}}

            @endforeach

        </div>
    </div>
@endsection
