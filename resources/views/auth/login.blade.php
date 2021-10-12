@extends('layouts.app')
@section('content')
    <h2 class="text-center">Login</h2>
    <form method="post" action="{{ route('login') }}" class="align-center">
        @csrf
        <div class="form-group">
            <label for="inputEmail">Email</label>
            <input type="email" class="form-control" name="email" id="inputEmail" placeholder="Email"
                   value="{{old('email')}}">
        </div>
        <div class="form-group">
            <label for="inputPassword">Password</label>
            <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password">
        </div>
        @if($errors->first())
            <div class="alert alert-danger text-center">{{$errors->first()}}</div>
        @endif
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary w-50">Sign in</button>
        </div>
        <div class="d-flex justify-content-center mt-2">
            <a href="{{ route('forgotpass') }}">You don't remember your password ?</a>
            <a href="{{ route('signup') }}" class="ml-5">You don't have your account ?</a>
        </div>
    </form>
@endsection
