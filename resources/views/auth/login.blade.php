@extends('layouts.plantilla')
@section('title', 'Login')
@section('plantilla')

<div class="container">
  <!--d-flex flex-column justify-content-center align-items-center min-vh-100 custom-container-->
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
    <button type="submit" class="btn btn-primary mb-3 w-100">Ingresar</button>
    <a href="{{Route('register')}}" class="btn btn-primary w-100">Registrarse</a><br>

    <span class="error-message" id="emailError"></span> 
    <span class="error-message" id="passwordError"></span> 

    <!--@if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>   
    @endif-->
  </form>
</div>
@endsection
