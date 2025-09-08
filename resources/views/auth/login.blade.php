@extends('layouts.app')

@section('title', 'Login')

@section('content')

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="fs-5 m-0 fw-bolder">Login</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('loginMatch')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            @error('email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                            @error('password')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-success   fs-6">Login</button>
                            <a href="{{route('register')}}" class="btn btn-outline-success">Register</a>
                        </div>


                        {{-- Wrong email/password error --}}
                        @if ($errors->has('loginError'))
                        <div class="alert alert-danger">
                            {{ $errors->first('loginError') }}
                        </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection