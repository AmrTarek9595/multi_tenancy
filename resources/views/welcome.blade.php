<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
       

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite([ public_path('main.css'),'resources/js/app.js'])
            
        @else
        <link href="/main.css" rel="stylesheet">
      
        @endif
        <link href="/main.css" rel="stylesheet">
    </head>
    <body id="app">
        <example-component ></example-component>
        
        <script type="text/javascript" src="/assets/scripts/main.d810cf0ae7f39f28f336.js"></script>
        <script src="/js/app.js"> </script>
    </body>

    </body>
</html>
