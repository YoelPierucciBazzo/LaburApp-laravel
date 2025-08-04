@extends('layouts.plantilla')
@section('titulo', 'Crear Publicación')
@section('contenido')
@vite('resources/css/app.css')
<form action="{{ route('crear.publicacion') }}" method="POST" enctype="multipart/form-data" class="cuadro-crear-formulario" >
    @csrf

    <h1>Crear publicación</h1>

    <h3>Título de la publicación</h3>
    <textarea name="nombre_publicacion" class="cuadro-crear-formulario" class="publicaciones" required>{{ old('nombre_publicacion') }}</textarea>

    <h3>Descripción de la publicación</h3>
    <textarea class="cuadro-crear-formulario" name="descripcion" required>{{ old('descripcion') }}</textarea>

    <h3>Seleccione una foto</h3>
    <input type="file" name="foto_portada" accept="image/*" required>

    <input type="hidden" id="fecha" name="fecha" value="{{ now()->format('Y-m-d') }}">

    <h3>Seleccionar profesión</h3>
            <select name="id_profesion" required class="seleccion-localidad">    
            <option value="" selected disabled>Seleccionar Profesion</option>
            @foreach ($profesiones as $profesion)
                <option value="{{ $profesion->id_profesion }}">{{ $profesion->nombre_profesion }}</option>
            @endforeach
            </select> 

    <br><br>
    <button type="submit" name="enviar" class="btn-busqueda" >Crear publicación</button>
</form>
@endsection

