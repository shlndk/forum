@php use Illuminate\Http\Request; @endphp
@extends('layouts.app')


@section('title', 'Search post')
<?php

?>

@section('content')
    @include('layouts.other.nav')
    <div class="container mt-5">
        <h2>Поиск постов</h2>
        <form action="{{ route('searchForm') }}" method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Введите название темы..."
                       value="{{ request('search') }}" required>
                <button class="btn btn-secondary" type="submit">Поиск</button>
                <a href="{{ route('showFav')}}" class="btn btn-dark">♡</a>
            </div>

        </form>

            <ul class="list-group">
                @foreach($posts as $post)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <a href="{{ route('showPost', $post) }}" class="text-decoration-none">{{ $post->title }}</a>
                        <span class="text-muted">{{ $post->created_at->format('d.m.Y H:i') }}</span>
                    </li>
                @endforeach
            </ul>
            @if($posts->count() == 0)
                <p class="text-muted">Ничего не найдено</p>
           @endif
    </div>

@endsection
