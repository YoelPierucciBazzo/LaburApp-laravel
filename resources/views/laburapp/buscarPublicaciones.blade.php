@extends('layouts.plantilla')
@section('titulo','Buscar Publicaciones')
@section('contenido')
<h1>Busqueda</h1>

@if($publicaciones->isEmpty())
    <p>No se encontraron publicaciones que coincidan con tu búsqueda.</p>
@else
    <ul>
        @foreach($publicaciones as $publicacion)
            <li>
                <strong>Título:{{ $publicacion->nombre_publicacion }}</strong><br>
                Descripcion:{{ $publicacion->descripcion }}<br>
                Profesión: {{ $publicacion->profesion->nombre_profesion ?? 'Sin especificar' }} <br>
                Usuario: {{ $publicacion->usuario->nombre}} {{$publicacion->usuario->apellido}}<br>
                <img src="{{ asset('storage/' . $publicacion->foto_portada) }}" alt="Imagen de la publicación" width="150" id="fotopubli"><br>
                <input type="button" class="boton" value="Ver publicación" onclick="location.href='{{ route('ver.publicacion', $publicacion->id_publicaciones) }}'">
            </li>
        @endforeach
    </ul>
@endif

@endsection