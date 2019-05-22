<!DOCTYPE html>
<html lang="en">
    <head>
        <title>@yield('title')</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('cmsp/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('cmsp/css/sweetalert.css') }}" rel="stylesheet">
    </head>
    <body>
        @yield('content')
        <script src="{{ asset('cmsp/js/jquery-3.3.1.min.js') }}" defer></script>
        <script src="{{ asset('cmsp/js/bootstrap.min.js') }}" defer></script>
        <script src="{{ asset('cmsp/js/sweetalert.min.js') }}" defer></script>
        <script src="{{ asset('cmsp/js/cmsp.js') }}" defer></script>
        <script src="{{ asset('cmsp/js/user.js') }}" defer></script>

    </body>
</html>
