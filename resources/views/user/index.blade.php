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
            </div>
            </hr><br>
            <!-- <ul class="list-group">
                    <li class="list-group-item text-muted">Activity <i class="fa fa-dashboard fa-1x"></i></li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong>Shares</strong></span> 125</li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong>Likes</strong></span> 13</li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong>Posts</strong></span> 37</li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong>Followers</strong></span> 78</li>
                </ul> -->
        </div>
        <!--/col-3-->
        <div class="col-sm-7">
            <div class="tab-content">
                <div class="tab-pane active" id="home">
                    <hr />
                    <div class="form-group">
                        <div class="col-xs-6">
                            <h5><strong>Account type:</strong> {{Auth::user()->type ==0?'Personal' : 'Organizer'}}
                            </h5>
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
        <h2>Transaction</h2>
        @foreach ($transactions as $transaction)
        @if ($transaction != null)
        {{ $transaction }}
        @endif
        @endforeach
    </div>

    <!-- HISOTORY OVERVIEW -->
    <div class="row">
        <h2>History</h2>
    </div>

    <!-- REPORT OVERVIEW -->
    <div class="row">
        <h2>Report</h2>
    </div>
</div>
</div>

@endsection