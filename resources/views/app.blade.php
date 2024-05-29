<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>App - @yield('title')</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased">
        @include('layouts.navbar')

        <div class="flex w-full mt-20">
            <div class="w-2/12">
                @include('layouts.sidebar')
            </div>

            <div class="flex-initial w-10/12 pl-12 sm:ml-12 h-screen">
                @yield('content')
            </div>
        </div>

        @yield('javascript')
        <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    </body>
</html>
