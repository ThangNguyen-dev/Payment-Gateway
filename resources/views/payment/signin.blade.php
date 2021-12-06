@extends('layouts.app')
@extends('layouts.footer')
@section('content')
    <div class="container py-5">
        <!-- For demo purpose -->
        <div class="row mb-4">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-6">Login Payment Gateway</h1>
            </div>
        </div> <!-- End -->
        <div class="row">
            <div id="credit-card" class="col-lg-6 mx-auto">
                <h1>Payment Detail</h1>
                <hr/>
                <div class="mt-4">
                    <p><strong>Provider: </strong>{{$user->fullname}}</p>
                </div>
                <div class="mt-4">
                    <p><strong>Price: </strong>{{$price}} VND</p>
                </div>
                <div class="mt-4">
                    <p><strong>Website: </strong>{{str_replace("'","",session()->get('redirect'))}}</p>
                </div>
            </div>
            <div class="col-lg-6 mx-auto">
                <div class="card ">
                    <div class="card-header">
                        <!-- Credit card form content -->
                        <div class="tab-content">
                            <!-- credit card info-->
                            <div id="credit-card" class="tab-pane fade show active pt-3">
                                <h1 class="text-center">Login Payment Gateway</h1>
                                <hr>
                                <form method="post" action="{{ route('auth.login') }}" class="align-center">
                                    @csrf
                                    <div class="form-group">
                                        <label for="inputEmail">Email</label>
                                        <input type="email" class="form-control" name="email" id="inputEmail"
                                               placeholder="Email" value="{{old('email')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword">Password</label>
                                        <input type="password" name="password" class="form-control" id="inputPassword"
                                               placeholder="Password">
                                    </div>
                                    @if($errors->first())
                                        <div class="alert alert-danger text-center">{{$errors->first()}}</div>
                                    @endif
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-primary w-50">Sign in</button>
                                    </div>
                                    <div class="d-flex justify-content-center mt-2">
                                        <a href="{{route('redirect')}}">&xlarr;Back</a>
                                    </div>
                                </form>
                            </div>
                        </div> <!-- End -->
                    </div>
                </div>
            </div>
        </div>
@endsection
