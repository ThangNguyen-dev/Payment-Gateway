@extends('layouts.app')
@extends('layouts.nav')
@section('content')
    <div class="list-group mt-4">
        @foreach( $notificationsUser as $notification)
            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start "
               style="pointer-events: none">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">{{$notification->notification->title}}</h5>
                    <small>Time: {{$notification->notification->created_at}}</small>
                </div>
                <p class="mb-1">
                    <strong>Description:</strong>
                    {{$notification->notification->description}}
                </p>
                <p class="mb-1">
                    <strong>Time</strong>:
                    {{date('H:i d/m/Y',strtotime($notification->notification->transaction->created_at))}}
                </p>
                <small>
                    <strong>Price</strong>: {{$notification->notification->transaction->price}}
                </small>
            </a>
        @endforeach
    </div>
@endsection
