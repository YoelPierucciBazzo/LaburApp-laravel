@extends('layouts.plantilla');

@section('contenido')
<main>
    <form action="{{route('actualizar.usuario')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <img src="{{ asset('storage/' . auth()->user()->foto_perfil )}}" class='fotoperfil'>
        <div class='contenedor-datos'><h2>Nombre y Apellido</h2></div>
        <div class='contenedor-datos'> <input type="text" name="nombre" value="{{auth()->user()->nombre}}"></div>
        <div class='contenedor-datos'> <input type="text" name="apellido" value="{{auth()->user()->apellido}}"></div>
        <div><h2>Contraseña</h2></div>
        <div>
            <label for="nueva-contraseña">Nueva Contraseña:</label>
            <input type="password" id="nueva-contraseña" name="nueva-contraseña">
        </div>
        <div>
        <label for="nueva-contraseña_confirmation">Confirmar Contraseña:</label>
        <input type="password" id="nueva-contraseña_confirmation" name="nueva-contraseña_confirmation">
        </div>
        <div><h2>Informacion</h2></div>
        <textarea id="info-input" name="informacion" cols="30" rows="10">{{ auth()->user()->informacion }}</textarea>
        <div class='contenedor-datos'> <h4>Número de Teléfono:</h4></div>
        <div><input type="tel" name="telefono" value="{{  auth()->user()->telefono}}"></div>
        <div class='contenedor-datos'> <h4>Domicilio</h4></div>
        <div><input type="text" name="domicilio" value="{{auth()->user()->domicilio}}"></div>
        <div class='contenedor-datos'> <h4>Mail</h4></div>
        <div><input type="text" name="mail" value="{{auth()->user()->mail}}"></div>
        <div class='contenedor-datos'> <h4>Localidad</h4></div>
        <div> <select name="id_localidad" required>
    @foreach ($localidades as $localidad)
        <option value="{{ $localidad->id_localidad }}"
            {{ $usuario->id_localidad == $localidad->id_localidad ? 'selected' : '' }}>
            {{ $localidad->nombre_localidad }}
        </option>
    @endforeach
</select>
        </div>
        <input type="submit" value="Actualizar perfil" class='boton'>
        <input type="button" class="boton" value="Volver" onClick='location="{{ route('perfil') }}"'>
        </form>
</main>
@endsection
