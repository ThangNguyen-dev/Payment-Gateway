@extends('layouts.app')
@extends('layouts.nav')
@extends('layouts.footer')
@section('content')

<div class="list-group pl-5 pr-5 ml-5 mr-5">
    <h1>Transaction Detail</h1>
    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start " style="pointer-events: none">
        <div class="d-flex w-100 justify-content-end">
            {{-- <h5 class="mb-1">{{$transaction->->title}}</h5>--}}
            <small>Time: {{date('F d, y H:i',strtotime($transaction->transaction_partner->created_at))}}</small>
        </div>
        <p class="mb-1">
            <strong>Sender: </strong>
            {{$transaction->transaction_partner->transaction_fullname}}
        </p>
        <p class="mb-1">
            <strong>Receiver: </strong>:
            {{$transaction->transaction_partner->representation}}
        </p>
        <p class="mb-1">
            <strong>Price</strong>:
            {{$transaction->price}} VND
        </p>
        <p class="mb-1">
            <strong>Tax code: </strong>:
            {{$transaction->transaction_partner->tax_code}}
        </p>
        <p class="mb-1">
            <strong>Identity Card: </strong>:
            {{$transaction->transaction_partner->identity_card}}
        </p>
    </a>
</div>
@endsection
