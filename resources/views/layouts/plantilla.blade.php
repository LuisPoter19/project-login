<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/css/custom.css', 'resources/js/custom.js'])
    <title>@yield('title')</title>
</head>
<body>
    <div class="d-flex flex-column align-items-center project-login">
        <h4>Project Login</h4>
        @yield('plantilla')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!--El siguiente bloque nos permitira crear unas rutas para acceder a las rutas en laravel.-->
    <script>
        window.routes = {//Variable global para pasarla a JS.
            register: "{{ route('register') }}",/*"register" es una propiedad que nos permitira almacenar la ruta, para
            posteriormente pasarla a JS y ejecutar el controlador en Laravel.*/

            recover: "{{ route('recover') }}",
        };
    </script> 
</body>
</html>