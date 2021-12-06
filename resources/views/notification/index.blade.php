@extends('layouts.app')
@extends('layouts.nav')
@extends('layouts.footer')
@section('content')
    <div class="list-group pl-5 pr-5 mt-5 ml-4 mr-4">
        <h1>Notifications</h1>
        @foreach( $notificationsUser as $notification)
            <a id="notification" href="#"
               class="list-group-item list-group-item-action flex-column align-items-start mt-2">
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
                    <strong>Price</strong>: {{$notification->notification->transaction->price}} VND
                </small>
            </a>
        @endforeach
    </div>

    <div id="pagination">
        <span>{{$notificationsUser->links()}}</span>
    </div>
@endsection
