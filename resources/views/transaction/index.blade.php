@extends('layouts.app')
@extends('layouts.nav')

@section('content')
    {{--    {{dd(\Illuminate\Support\Facades\Auth::user()->sender)}}--}}
    <div class="container-fluid">
        <div class="d-flex justify-content-between">
            <h4 class="mb-2">Transaction</h4>
        </div>
    </div>
    <div class="container-fluid">
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
                        <td><a href="#">Detail</a></td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
@endsection
