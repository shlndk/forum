@extends('layouts.app')
<?php

?>
@section('content')
    @include('layouts.other.nav')
    @if(session('success'))
        <div class="alert alert-success">>
            {{ session('success') }}
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
                            <i class="bi bi-heart"></i> Добавить в избранное
                        </button>
                    </form>
                    <a href="javascript:history.back();" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left"></i> Назад к поиску
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

