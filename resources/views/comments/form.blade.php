@extends('layouts.app')


@include('layouts.other.nav')

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@auth
    <form action="{{ route('addComment') }}" method="POST" class="mt-4">
        @csrf
        <input type="hidden" name="post_id" value="{{ $post->id }}">
        <div class="mb-3">
            <p class="fw-bold form-label">Leave a comment</p>
            <textarea name="content" class="form-control" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Send</button>
        <a href="javascript:history.back();" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left"></i> Back to post
        </a>
    </form>
@else
    <p>Please, <a href="{{ route('login') }}">log in</a>, to leave a comment</p>
@endauth

