<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .level{

            display: flex;
            align-items: center;
        }

        .flax{

        flex: 1;
        }

    </style>
    <script>
        window.App = {!! json_encode([
        "csrfToken" => csrf_token(),
        "user" =>auth()->user(),
        "singIn" => Auth::check()
            ]);
         !!}
    </script>
</head>
<body>
    <div id="app">

        @include('layouts.nav')
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
