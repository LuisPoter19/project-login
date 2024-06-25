@extends('layouts.plantilla')
@section('title', 'Login')
@section('plantilla')
<form class="container" action="{{Route('login')}}" method="POST">
@csrf
  <h4>Iniciar Sesión</h4>
  <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="email" class="form-control" id="email" aria-describedby="email" name="email">
  </div>
  <div class="mb-3">
      <label for="password" class="form-label">Contraseña</label>
      <input type="password" class="form-control" id="password" name="password">
  </div>
  <button type="submit" class="btn btn-primary">Ingresar</button>
  <a href="{{Route('register')}}" class="btn btn-primary">Registrarse</a>
</form>
@endsection
