@extends('layouts.app')
@section('content')
    <h2 class="text-center">Reset Password</h2>
    <h3>Xin Chao, {{ $user->fullname }}.</h3>
    <form method="post" action="{{ route('updatepassword') }}" class="align-center">
        @csrf
        <div class="d-flex justify-content-center">
            <input type="hidden" name="token" value="{{ $passwordReset->token }}">
        </div>
        <div class="form-group">
            <label for="inputPassword">New Password</label>
            <input type="password" name="password" class="form-control" id="inputPassword" placeholder="New Password">
        </div>
        <div class="form-group">
            <label for="inputPassword">Password</label>
            <input type="password" name="password_confirm" class="form-control" id="inputPassword"
                placeholder="Password Confirm">
        </div>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary w-50">Sign in</button>
        </div>
        <div class="d-flex justify-content-center mt-2">
            <a href="{{ route('forgotpass') }}">You don't remember your password ?</a>
            <a href="{{ route('signup') }}" class="ml-5">You don't have your account ?</a>
        </div>
    </form>
@endsection
