@section('header')
    <nav class="navbar navbar-expand-lg navbar-light bg-light pl-5 pr-5">
        <a class="navbar-brand" href="#">Payment Gateway</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                <li class="nav-item">
                    <a class="nav-link btn btn-light  {{\Illuminate\Support\Facades\Route::getCurrentRoute()->uri == 'notification' ? 'active' : ''}}"
                       href="{{route('notification.index')}}"> Notification <span class="badge badge-info">4</span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Service
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{route('transfer')}}">Transfers</a>
                        <a class="dropdown-item" href="#">Bank Transfers</a>
                        {{--                        <div class="dropdown-divider"></div>--}}
                        {{--                        <a class="dropdown-item" href="#">Something else here</a>--}}
                    </div>
                </li>
            </ul>
        </div>
        <div class="mr-5">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <div class="d-flex justify-content-center align-items-center">
                        <a class="nav-link dropdown-toggle pt-2" href="#" id="navbarDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                 fill="currentColor"
                                 class="bi bi-person-circle mt-3" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                <path fill-rule="evenodd"
                                      d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                            </svg>
                            <span class="mb-2">{{ Auth::user()->fullname }}</span>
                        </a>
                    </div>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item btn btn-primary" href="#">Profile</a>
                        <a class="dropdown-item" href="#">Change Password</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item btn-primary" href="{{route('logout')}}">Log Out</a>
                    </div>
                </li>
            </ul>
        </div>
        </div>
    </nav>
@endsection
