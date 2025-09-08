@extends('layouts.app')

@section('title', 'Register')

@section('content')

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="fs-5 m-0 fw-bolder">Register</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('userSave')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name </label>
                            <input type="text" class="form-control" value="{{ old('name') }}" id="name" name="name" aria-describedby="emailHelp">
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email1" class="form-label">Email address</label>
                            <input type="email" class="form-control" value="{{ old('email') }}" name="email" id="email1" aria-describedby="emailHelp">
                            @error('email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password1" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="password1">
                            @error('password')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Conform Password</label>
                            <input type="password" class="form-control" name="password_confirmation" id="">
                            @error('password_confirmation')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-success  fs-6">Signup</button>

                            <a href="{{route('login')}}" class="btn btn-outline-success">Login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection