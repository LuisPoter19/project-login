@extends('layouts.plantilla')
@section('title', 'Login')
@section('plantilla')
<div class="container d-flex flex-column justify-content-center align-items-center min-vh-100">
<form class="container" action="{{Route('login')}}" method="POST">
@csrf
  <h4 class="mb-4">Iniciar Sesión</h4>
  <div class="form-group mb-4 text-center">
      <input type="email" class="form-control" placeholder=" " id="email" aria-describedby="email" name="email">
      <label for="email" class="placeholder-label">Email</label>
  </div>
  <div class="form-group mb-3">
      <input type="password" class="form-control" placeholder=" " id="password" name="password">
      <label for="password" class="placeholder-label">Contraseña</label>
  </div>
  <button type="submit" class="btn btn-primary mb-3">Ingresar</button>
  <a href="{{Route('register')}}" class="btn btn-primary">Registrarse</a>
</form>
</div>
@endsection
