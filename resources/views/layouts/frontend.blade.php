<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/logo_pln.png') }}" />

        <title>MARGIE ANDALAN | {{ $title }}</title>
        <link rel="stylesheet" href="{{ asset('libs/font-awesome/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('libs/simple-line-icons/css/simple-line-icons.css') }}">
        <link rel="stylesheet" href="{{ asset('libs/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/front.css') }}">

        @yield('css-lib')
        @yield('css')
    </head>
    <body class="{{ strtolower($title) }}">
        @include('partials.frontend.header')
        <!-- Full Width Column -->
        <div id="content" class="app-content" role="main">
            <div class="app-content-body ">
                <div class="hbox">
                    @yield('content')
                </div>
            </div>
        </div>
        @include('partials.frontend.footer')

        <script src="{{ asset('plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
        <script src="{{ asset('libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('js/front.js') }}"></script>

        @yield('js-lib')
        @yield('js')
    </body>
</html>
