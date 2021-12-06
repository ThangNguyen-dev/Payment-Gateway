@extends('layouts.app')
@section('content')
    <div class="container">
        <h1 class="text-center mt-5">Login Payment Gateway</h1>
        <hr>
        <form method="post" action="{{ route('login') }}" class="align-center">
            @csrf
            <div id="form-login">
                <div id="email" class="form-group w-50">
                    <label for="inputEmail">Email</label>
                    <input type="email" class="form-control" name="email"
                           id="inputEmail" placeholder="Email"
                           value="{{old('email')}}">
                </div>
                <div id="password" class="form-group w-50">
                    <label for="inputPassword">Password</label>
                    <input type="password" name="password"
                           class="form-control" id="inputPassword"
                           placeholder="Password">
                </div>
                @if($errors->first('login'))
                    <div class="alert alert-danger text-center w-50">{{$errors->first('login')}}</div>
                @endif
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary w-50">Sign in</button>
            </div>
            <div class="d-flex justify-content-center mt-2">
                <a href="{{ route('forgotpass') }}">You don't remember your password ?</a>
                <a href="{{ route('signup') }}" class="ml-5">You don't have your account ?</a>
            </div>
        </form>
    </div>
@endsection
