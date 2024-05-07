<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laracoding.com - Including jQuery with Vite</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <h1 class="text-red-600 bg-gray-300">
            Test tailwindcss
        </h1>
        <br />
        <p class="zoomable">
            Click me to zoom
        </p>
        <script type="module">
            $(document).ready(function(){
                alert("Thanks");

                $(".zoomable").click(function(){
                    $(this).animate({
                        fontSize: "40px"
                    }, 1000);
                });
            });
        </script>
    </body>
</html>
