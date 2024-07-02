@extends('layouts.plantilla')

@section('title', 'Registro')

@section('plantilla')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>        
@endif
<form action="{{Route('register')}}" method="POST" class="container">
@csrf
    <h4>Registrate</h4>
    <div>
        <label for="email" class="form-label">Correo Electronico</label>
        <input type="email" id="email" name="email" class="form-control">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Contraseña</label>
        <input type="text" id="password" name="password" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Registrate</button>
    <a href="{{Route('viewLogin')}}" class="btn btn-primary">Volver</a>
</form>
@endsection
