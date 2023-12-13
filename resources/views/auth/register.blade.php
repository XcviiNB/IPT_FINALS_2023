@extends('base')

@section('content')

<div class="container col-md-6 offset-md-3 mt-5">
    <h1 class="text-center text-success">Create new account</h1>
    <form action="{{'/register'}}" method="POST">
        {{csrf_field()}}

        <div class="form-group mb-3 text-secondary">
            <label for="name" class="text-white">Name</label>
            <input type="text" name="name" id="name" class="form-control">
            @error('name')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>

        <div class="form-group mb-3 text-secondary">
            <label for="email" class="text-white">Email</label>
            <input type="email" name="email" id="email" class="form-control">
            @error('email')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>

        <div class="form-group mb-3 text-secondary">
            <label for="password" class="text-white">Password</label>
            <input type="password" name="password" id="password" class="form-control">
            @error('password')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>

        <div class="form-group mb-3 text-secondary">
            <label for="password_confirmation" class="text-white">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
            @error('password_confirmation')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>

        <div class="d-flex">
            <div class="flex-grow-1">
                <a href="{{'/'}}" class="text-white">Already have an account</a>
            </div>
            <button class="btn btn-success px-5" type="submit">Register</button>
        </div>
    </form>
</div>

@endsection
