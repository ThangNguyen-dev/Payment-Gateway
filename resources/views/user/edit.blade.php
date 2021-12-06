@extends('layouts.app')
@extends('layouts.nav')
@section('content')
<div class="container mt-3">
    <h2>Edit user profile</h2>
    <hr>
    <form action="{{route('user.update',Auth::id())}}" method="POST">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col mt-3">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" class="form-control {{$errors->first('email') ? 'invalid':''}}" value="{{old('email') ? old('email'):Auth::user()->email}}" placeholder="Email" required>
                @if ($errors->first('email'))
                <div class="alert alert-danger" role="alert">
                    {{$errors->first('email')}}
                </div>
                @endif
            </div>
            <div class="col mt-3">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" class="form-control {{$errors->first('username') ? 'invalid':''}}" value="{{old('username') ? old('username'):Auth::user()->username}}" placeholder="Username" required>
                @if ($errors->first('username'))
                <div class="alert alert-danger" role="alert">
                    {{$errors->first('username')}}
                </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col mt-3">
                <label for="fullname">Full name</label>
                <input type="text" id="fullname" name="fullname" class="form-control {{$errors->first('email') ? 'invalid':''}}" value="{{old('fullname') ? old('fullname'):Auth::user()->fullname}}" placeholder="Full name" required>
                @if ($errors->first('fullname'))
                <div class="alert alert-danger" role="alert">
                    {{$errors->first('fullname')}}
                </div>
                @endif
            </div>
            <div class="col mt-3">
                <label for="number_phone">Number Phone</label>
                <input type="number" name="number_phone" id="number_phone" class="form-control {{$errors->first('number_phone') ? 'invalid':''}}" value="{{old('number_phone') ? old('number_phone'):Auth::user()->number_phone}}" placeholder="Number Phone" required>
                @if ($errors->first('number_phone'))
                <div class="alert alert-danger" role="alert">
                    {{$errors->first('number_phone')}}
                </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col mt-3 update">
                <input type="submit" value="Update" name="Update" class="btn btn-primary mt-2">
            </div>
        </div>
    </form>
</div>
@endsection
