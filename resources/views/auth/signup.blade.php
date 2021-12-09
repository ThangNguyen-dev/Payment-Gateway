@extends('layouts.app')
@extends('layouts.nav')
@section('content')
    <div class="container">
        <h2 class="text-center">Sign Up</h2>
        <form method="post" action="{{ route('signup') }}">
            @csrf
            <div class="form-group">
                <label for="inputEmail">Email</label>
                <input type="email" class="form-control" name="email" id="inputEmail" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="inputPassword">Password</label>
                <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="inputPassword">UserName</label>
                <input type="text" name="username" class="form-control" id="inputPassword" placeholder="Username">
            </div>
            <div class="form-group">
                <label for="inputPassword">Type</label>
                <select type="text" name="type" class="form-control" id="inputPassword" placeholder="type">
                    <option value="0">Personal</option>
                    <option value="1">Organizer</option>
                </select>
            </div>
            <div class="form-group">
                <label for="inputPassword">FullName</label>
                <input type="text" name="fullname" class="form-control" id="inputPassword" placeholder="FullName">
            </div>
            <div class="form-group">
                <label for="inputPassword">Number Phone</label>
                <input type="text" name="number_phone" class="form-control" id="inputPassword" placeholder="Number Phone">
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary w-50">Sign Up</button>
            </div>
            <div class="d-flex justify-content-center">
                <a href="{{ route('login') }}">I have a account ?</a>
                <a href="{{ route('forgotpass') }}" class="ml-5">I am forgot my password ?</a>
            </div>
        </form>
    </div>
@endsection
