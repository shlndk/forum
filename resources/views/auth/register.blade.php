@extends('layouts.app')

@section('title', 'Register')

@include('layouts.other.nav')

<form action="{{ route('register') }}" method="POST">
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
                        <div class="forms-inputs">
                            <span>Name</span>
                            <input autocomplete="on" type="text" name="name" value="{{old('name')}}" class="form-control" required>
                            <div class="invalid-feedback">Name is required!</div>
                        <div class="forms-inputs">
                            <span>Email</span>
                            <input autocomplete="on" type="email" name="email" value="{{old('email')}}" class="form-control" required>
                            <div class="invalid-feedback">A valid email is required!</div>
                        </div>
                        <div class="forms-inputs">
                            <span>Password</span>
                            <input autocomplete="off" type="password" name="password" class="form-control" required>
                            <div class="invalid-feedback">Password must be 8 characters!</div>
                        </div>
                        <div class="forms-inputs">
                            <span>Confirm Password</span>
                            <input autocomplete="off" type="password" name="password_confirmation" class="form-control" required>

                            <div class="invalid-feedback">Password must be 8 characters!</div>

                        <div class="mt-3">
                            <button type="submit" class="btn btn-dark w-100">Register</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
