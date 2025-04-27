@extends('layouts.app')


@section('title', 'Create Post')


@section('content')

    @include('layouts.other.nav')

    @guest
        <div class="alert alert-warning d-flex align-items-center shadow-sm" role="alert">
            <i class="bi bi-exclamation-triangle-fill me-2"></i>
            <div>
                Чтобы создать пост, вам нужно <a href="{{route('login')}}" class="fw-bold text-decoration-none">авторизоваться</a>.
            </div>
        </div>
    @endguest

    @auth
        <div class="container mt-5">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card">
                <div class="card-header bg-dark text-white">Создать новый пост</div>
                <div class="card-body">
                    <form action="{{ route('createPost') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Заголовок</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="content" class="form-label">Содержимое</label>
                            <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-secondary">Создать пост</button>
                    </form>
                </div>
            </div>
        </div>
    @endauth

@endsection
