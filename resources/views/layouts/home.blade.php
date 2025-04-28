@extends('layouts.app')


@section('title', 'Home')


@section('content')
    @include('layouts.other.nav')
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="container mt-5">
        <h1 class="text-center">Welcome to the Forum!</h1>
        <p class="text-center">Discuss and share models with others. Join our community!</p>
        @role('user')
        <p class="text-center">If you wanna be admin you must do the <a href="{{route('test')}}"
                                                                        class="fw-bold text-decoration-none">test</a>
            @endrole
        </p>
    </div>

@endsection
