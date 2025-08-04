@extends('layouts.plantilla')
@section('titulo','Ver Publicación')
@section('contenido')
<h1>hola</h1>
<form action="{{route('ver.publicacion', $publicacion->id_publicaciones)}}" action="get" enctype="multipart/form-data">
@csrf
    <label for="nombre_publicacion">Título:</label>
    <input type="text" name="nombre_publicacion" value="{{$publicacion->nombre_publicacion}}" disabled> <br> <br>
    <label for="descripcion">Descripción:</label>
    <input type="text" name="descripción" value="{{$publicacion->descripcion}}" disabled> <br> <br>
    <label for="profesion">Profesión:</label>
    <input type="text" name="profesion" value="{{$publicacion->profesion->nombre_profesion ?? 'Sin especificar'}}" disabled> <br> <br>
    <label for="usuario">Usuario:</label>
    <input type="button" class="boton" value="{{$publicacion->usuario->nombre}} {{$publicacion->usuario->apellido}}" onclick="location.href='{{ route('ver.usuario', $publicacion->id_publicaciones) }}'"> <br> <br>
{{--     <form action="{{route('ver.usuario', $publicacion->id_publicaciones)}}" method="get">
        <input type="submit" name="usuario" value="{{$publicacion->usuario->nombre}} {{$publicacion->usuario->apellido}}" ></a> <br> <br>
    </form> --}}
    <label for="foto_portada">Foto de portada:</label>
    <img src="{{ asset('storage/' . $publicacion->foto_portada) }}" alt="Imagen de la publicación" width="150" id="fotopubli"><br>
    <input type="button" class="boton" value="Volver" onclick="location.href='{{route('buscar.publicaciones')}}'">
</form>

@endsection