<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>
            @if(View::hasSection('title'))
                @yield('title') - {{ config('app.name', 'Laravel') }}
            @else
                {{ config('app.name', 'Laravel') }}
            @endif
        </title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/menu.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/jquery-3.6.0.min.js') }}" defer></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
        <script src="{{ asset('js/bootstrap.min.js') }}" defer></script>
        <script src="{{ asset('js/menu.js') }}"></script>
    </head>
    <body class="text-dark">
        <!-- Page Header -->
        <header>
            @include('layouts.navigation')
        </header>

        <!-- Page Main -->
        <main class="d-flex">
            <div id="sidebar">
                @include('layouts.sidebar')
            </div>
            <div id="content">
                <div class="bg-white mb-4 shadow-sm">
                    <div class="container">
                        {{ $header }}
                    </div>
                </div>
                {{ $slot }}
            </div>
        </main>
        
        <!-- Page Footer -->
        <footer class="text-center">
            <small>&copy; Copyright 2022, NTA Vietnam. All Rights Reserved</small>
        </footer>
    </body>
</html>
