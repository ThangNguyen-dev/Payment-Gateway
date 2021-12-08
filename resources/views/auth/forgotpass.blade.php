@extends('layouts.app')
@section('content')
    <div class="container mt-3">
        <h2 class="text-center">Reset Your Password</h2>
        <form method="post" action="{{ route('resetPassword') }}" class="align-center">
            @csrf
            <div class="form-group">
                <label for="inputEmail">Email</label>
                <input type="email" class="form-control" name="email" id="inputEmail" placeholder="Email">
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary w-50">Send Password Reset Link Mail</button>
            </div>
            <div class="d-flex justify-content-center mt-2">
                <a href="{{ route('login') }}">You have a account ?</a>
                <a href="{{ route('signup') }}" class="ml-5">You don't have your account ?</a>
            </div>
        </form>
    </div>
@endsection
