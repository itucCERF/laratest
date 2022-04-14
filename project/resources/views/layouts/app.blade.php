<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <!-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
        <script src="{{ asset('js/bootstrap.min.js') }}" defer></script>
    </head>
    <body class="text-dark">
        <div class="min-vh-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            <header class="bg-white mb-4 shadow-sm">
                <div class="container">
                    {{ $header }}
                </div>
            </header>

            <!-- Page Content -->
            <main>
                <div class="container">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </body>
</html>
