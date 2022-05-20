<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0/css/bootstrap-grid.min.css" integrity="sha512-vWtGaoxGWtwzJnP6e3YbBCE2BAEbldcuL4TVO3IbW/IFocN/XxuBv3Fuqm7t+I4eZ7p8L9iBElSUqXQUbQmarA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="/public/assets/css/auth.css" rel="stylesheet" type="text/css">

    <title>@yield('title', 'Employee Management System')</title>
    <link rel="icon" href="{{asset('assets/images/icon.png')}}" type="image/x-icon">

    <link rel="preconnect" href="https://fonts.gstatic.com">

    @yield('style')
    <link href="https://fonts.googleapis.com/css2?family=Audiowide&display=swap" rel="stylesheet">
</head>

<body>
    <div id="container">
        @include('layouts.alert')
        @yield('content')
    </div>

</body>
</html>
