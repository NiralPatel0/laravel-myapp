@extends('layouts.app')

@section('title', 'Home')

@section('content')

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">

            <div class="card">
                <div class="card-body text-center">
                    <h3 class="fs-5 m-0 fw-bolder mb-4">Welcome To My App</h3>

                    <div class="d-flex gap-2 justify-content-center">
                        <a href="{{route('login')}}" class="btn btn-success">Login</a>
                        <a href="{{route('register')}}" class="btn btn-outline-success">Register</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection