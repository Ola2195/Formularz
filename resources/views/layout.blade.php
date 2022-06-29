<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Users</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
        <script src="{{ asset('js/app.js') }}" type="text/js"></script>
    </head>
    <body>
        <div class="container">
            @yield('content')
    </div>
    </body>
</html>