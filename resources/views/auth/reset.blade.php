@extends('layouts.plantilla')
@section('title', 'Crear clave')
    
@section('plantilla')
    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>
        <label for="password">Contraseña</label>
        <input type="password" id="password" name="password" required>
        <label for="password_confirmation">Confirmar Contraseña</label>
        <input type="password" id="password_confirmation" name="password_confirmation" required>
        <button type="submit">Restablecer Contraseña</button>
    </form>
@endsection
