@extends('layouts.plantilla')
@section('title', 'Login')
@section('plantilla')

<div class="container">
  <form class="form-box p-4 shadow-lg rounded" action="{{Route('login')}}" method="POST" id="loginForm">
  @csrf
    <h4 class="mb-4 text-center">Iniciar Sesión</h4>
    <div class="form-group mb-4 flex-grow-1">
        <input type="email" class="form-control" placeholder=" " id="email" aria-describedby="email" name="email">
        <label for="email" class="placeholder-label">Email</label>
    </div>

    <div class="form-group mb-3">
        <input type="password" class="form-control" placeholder=" " id="password" name="password">
        <label for="password" class="placeholder-label">Contraseña</label>
    </div>
    <button type="submit" class="btn btn-primary mb-3 w-100" id="loginBtn">Ingresar</button>
    <a class="btn btn-primary w-100" id="registerBtn">Registrarse</a><br>

  </form>
</div>

<!--Este bloque "if" permitira capturar los errores generador por parte del servidor-->
@if ($errors->any())<!--Los errores se almacenarán en la variable "errors", "any()"" es un metodo que deolvera true si se ha
    encontrado algún error.-->
        <script>
            window.hasErrors = true;/*"window" es un objeto global, que permitira globalizar la variable "hasErrors" en true
            si se ha detectado un error, esto es con el fin de usar esta variable en otro archivo js y mostrar mensajes de error.*/
            window.errorMessage = '{{ $errors->first() }}';/*Se almacenara el primer error encontrado, para luego pasarlo
            a js y mostrar el mensaje de error.*/
        </script>
    @else
        <script>
            window.hasErrors = false;//Si no se encuentra ningún error la variable sera false.
        </script>
@endif

@endsection

