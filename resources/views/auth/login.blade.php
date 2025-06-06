@extends('layouts.app')

@section('title', 'Login')

@include('layouts.other.nav')

<form action="{{ route('login') }}" method="POST">
    @csrf
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6">
                <div class="card px-5 py-5" id="form1">
                    <div class="form-data">
                        <div class="forms-inputs mb-4">
                            <span>Email</span>
                            <input autocomplete="off" type="email" name="email" class="form-control" required>
                            <div class="invalid-feedback">A valid email is required!</div>
                        </div>
                        <div class="forms-inputs mb-4">
                            <span>Password</span>
                            <input autocomplete="off" type="password" name="password" class="form-control" required>
                            <div class="invalid-feedback">Password must be 8 characters!</div>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-dark w-100">Login</button>
                        </div>

                        <a href="{{ route('googleLogin') }}" class="btn btn-outline-light border d-flex align-items-center gap-2 shadow-sm" style="background-color: white;">
                            <img src="https://developers.google.com/identity/images/g-logo.png" alt="Google" width="20" height="20">
                            <span class="text-dark">Continue with Google</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
