<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ isset($title) ? $title . ' - ' . config('app.name', 'Payment Gateway') : config('app.name', 'Payment Gateway') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->

    <link rel="stylesheet" href="{{asset('public/css/dashboard.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/transfer.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/payment.css')}}">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script src="{{asset('public/js/jquery.js')}}"></script>
    <script src="{{asset('public/js/custom.js')}}"></script>

</head>

<body class="antialiased">
    <main class="container-fluid align-center">
        @yield('header')
            @yield('content')
    </main>

    @yield('footer')
</body>

</html>
