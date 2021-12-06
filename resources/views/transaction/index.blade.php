@extends('layouts.app')
@extends('layouts.nav')
@extends('layouts.footer')
@section('content')
<div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 bg-light">
    <div class="col-md-5 p-lg-5 mx-auto my-5">
        <h1 class="display-4 font-weight-normal">Transactions</h1>
        <p class="lead font-weight-normal">And an even wittier subheading to boot. Jumpstart your marketing efforts with this example based on Apple's marketing pages.</p>
        <a class="btn btn-outline-secondary" href="#">Coming soon</a>
    </div>
    <div class="product-device shadow-sm d-none d-md-block"></div>
    <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
</div>
<div class="container">
    <div class="d-flex justify-content-between">
        <h4 class="mb-2">Transaction</h4>
    </div>
</div>
<div class="container">
    <div class="table-responsive row">
        <table class="table table-striped table-light">
            <thead>
                <tr>
                    <th scope="col">Type</th>
                    <th scope="col">Title</th>
                    <th scope="col">Code Bill</th>
                    <th scope="col">Description</th>
                    <th scope="col">Price</th>
                    <th scope="col">Time</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach(\Illuminate\Support\Facades\Auth::user()->sender as $sender)
                <tr>
                    <th scope="row">Send</th>
                    <td>{{$sender['title']}}</td>
                    <td>{{$sender['code_bill']}}</td>
                    <td>{{$sender['description']}}</td>
                    <td>{{$sender['price']}}</td>
                    <td>{{date('H:i m/d/Y',strtotime($sender['created_at']))}}</td>
                    <td><a href="{{route('transaction.show',$sender->id)}}">Detail</a></td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
</div>
@endsection
