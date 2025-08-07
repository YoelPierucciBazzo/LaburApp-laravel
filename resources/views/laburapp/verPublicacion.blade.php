@extends('layouts.plantilla')
@section('titulo','Ver Publicación')
@section('contenido')
<h1>Ver publicación</h1>

<div class="seccion">
    <div class="publicaciones">
        <div class="link">
            <h2>{{ $publicacion->nombre_publicacion }}</h2>
            <p>{{ $publicacion->descripcion }}</p>
            <p>{{ $publicacion->profesion->nombre_profesion ?? 'Sin especificar' }}</p>
            <p>Publicado por: 
                <input type="button" class="boton" 
                    value="{{ $publicacion->usuario->nombre }} {{ $publicacion->usuario->apellido }}" 
                    onclick="location.href='{{ route('ver.usuario', $publicacion->id_publicaciones) }}'">
            </p>

            <img src="{{ asset('storage/' . $publicacion->foto_portada) }}" alt="Imagen de la publicación" id="fotopubli">

            <div style="margin-top: 15px;">
                <input type="button" class="boton" value="Volver" onclick="location.href='{{ route('buscar.publicaciones') }}'">
            </div>
        </div>
    </div>
</div>


@endsection