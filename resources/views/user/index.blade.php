@extends('layouts.app')
@extends('layouts.nav')
@section('content')


<div class="container mt-5 snippet">
    <div class="row">
        <div class="col-sm-5">
            <!--left col-->
            <div class="text-center">
                <img id="avatar" width="45%" src="{{asset('public/img/avatar_2x.png')}}" class="avatar img-circle img-thumbnail" alt="avatar">
                <h1 class="text-center">{{Auth::user()->fullname}}</h1>
                <a href="{{route('user.edit', Auth::id())}}" title="Edit user profile">Edit Profile</a>
            </div>
            </hr><br>
        </div>
        <!--/col-3-->
        <div class="col-sm-7">
            <div class="tab-content">
                <div class="tab-pane active" id="home">
                    <hr />
                    <div class="form-group">
                        <div class="col-xs-6">
                            <h5>
                                <strong>Account type:</strong> {{Auth::user()->type ==0?'Personal' : 'Organizer'}}
                            </h5>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-6">
                            <h5><strong>User name:</strong> {{Auth::user()->username}}</h5>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-6">
                            <h5><strong>Full name:</strong> {{Auth::user()->fullname}}</h5>
                        </div>
                    </div>
                    <div class="form-group">

                        <div class="col-xs-6">
                            <h5><strong>Balance:</strong> {{number_format(Auth::user()->balance)}} VND</h5>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-6">
                            <h5><strong>Number phone: </strong>{{Auth::user()->number_phone}}</h5>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-6">
                            <h5><strong>Email:</strong> {{Auth::user()->email}}</h5>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!--/tab-pane-->
    </div>
    <hr />
    <!--/tab-content-->
</div>
<!--/row-->
<div class="container">
    <div class="row">
        <div class="row">
            <h2>Transaction</h2>
        </div>
        @foreach ($transactions as $transaction)
        <div class="card transaction w-100" style="margin-bottom: 0.5rem;">
            <div class="card-body">
                <!-- <h5>{{$transaction}}</h5> -->
                <h5>Thoi gian: {{date(' d/m/Y H:i',strtotime($transaction->created_at))}}</h5>
                <h5>Price: {{($transaction->send->id) == Auth::id() ? " -"  .$transaction->price : "+" .$transaction->price}}</h5>
                <h5>Code bill: {{$transaction->code_bill}}</h5>
                <h5>Message: {{$transaction->description}}</h5>
            </div>
        </div>
        @endforeach
    </div>

    <!-- REPORT OVERVIEW -->
    <div class="row">
        <h2>Report</h2>
    </div>
</div>
</div>

@endsection