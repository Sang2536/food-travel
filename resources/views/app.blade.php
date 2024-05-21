<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>App - @yield('title')</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased">
        @include('components.navbar')

        <div class="flex w-full mt-20">
            @include('components.sidebar')

            <div class="flex-initial w-10/12 pl-12 sm:ml-12 h-screen">
                @yield('content')
                {{-- @include('components.content') --}}
            </div>
        </div>

        @yield('javascript')
    </body>
</html>
