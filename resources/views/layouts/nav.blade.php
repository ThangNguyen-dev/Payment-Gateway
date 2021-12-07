@section('header')
<nav class="navbar navbar-expand-lg navbar-light bg-light pl-5 pr-5">
    <a class="navbar-brand" href="/">
        <img src="{{asset('public/img/logo.png')}}" id="logo" alt="" srcset="{{asset('public/img/logo.png')}}">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item {{\Illuminate\Support\Facades\Route::getCurrentRoute()->uri != 'transaction' ? \Illuminate\Support\Facades\Route::getCurrentRoute()->uri != 'notification' ? 'active' : '':''}}">
                <a class="nav-link btn btn-light" href="{{route('home')}}">Home<span class="sr-only"></span></a>
            </li>
            <li class="nav-item {{\Illuminate\Support\Facades\Route::getCurrentRoute()->uri == 'transaction' ? 'active' : ''}}">
                <a class="nav-link btn btn-light" href="{{route('transaction.index')}}">Transaction</a>
            </li>
            <li class="nav-item {{\Illuminate\Support\Facades\Route::getCurrentRoute()->uri == 'notification' ? 'active' : ''}}">
                <a class="nav-link btn btn-light" href="{{route('notification.index')}}">Notification
                    <span class="badge badge-info" id="notification_unread"></span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Service
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{route('transfer')}}">Transfers</a>
                    <a class="dropdown-item" href="{{route('bank')}}">Bank Transfers</a>
                    {{-- <div class="dropdown-divider"></div>--}}
                </div>
            </li>
        </ul>
    </div>
    <div class="mr-5">
        @if (Auth::user())
        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle bg-light" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border: none; color: black;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                        </svg>
                        {{ Auth::user()->fullname }}
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                        <a href="{{route('user.index')}}" class="dropdown-item" type="button">Profile</a>
{{--                        <a href="{{route('api.index')}}" class="dropdown-item" type="button">API Manage</a>--}}
                        <!-- <button class="dropdown-item" type="button"></button> -->
                        <a href="{{route('logout')}}" class="dropdown-item" type="button">Logout</a>
                    </div>
                </div>
            </li>
        </ul>
        @else
        <div class="nav nav-bar">
            <a href="{{route('login')}}" class="btn btn-light">Login</a>
            <a href="{{route('signup')}}" class="btn btn-light">Logout</a>
        </div>
        @endif
    </div>
</nav>
@endsection
