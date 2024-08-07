<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Food Travel - @yield('title')</title>
        <link rel="icon" type="image/x-icon" href="/images/favicon.ico">

        <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
        @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/main.js'])
    </head>
    <body class="antialiased">
        @include('layouts.navbar')

        <div class="flex w-full mt-20">
            <div class="float-left w-1/5 max-lg:collapse max-lg:w-0">
                @include('layouts.sidebar')
            </div>

            <div class="float-left px-4 w-4/5 h-auto h-min-screen bg-gray-50 max-lg:w-full">
                @yield('content')

                @include('layouts.footer')
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
        <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
        @stack('script')
    </body>
</html>
