@extends('layouts.plantilla')
@section('titulo','Modificar Publicación')
@section('contenido')
<h1>Modificar publicación</h1>
<form action="{{ route('modificar.publicacion', $publicacion->id_publicaciones) }}" method="POST" enctype="multipart/form-data">
    @csrf

    <label for="nombre_publicacion">Título: </label>
    <input type="text" name="nombre_publicacion" id="nombre_publicacion" value="{{ $publicacion->nombre_publicacion }}">
    <br><br>

    <label for="descripcion">Descripción:</label>
    <textarea name="descripcion" id="descripcion" cols="30" rows="10">{{ $publicacion->descripcion }}</textarea>
    <br><br>

    <label for="profesion">Profesión:</label>
    <select name="id_profesion" id="profesion">
        <option value="" selected disabled>Seleccionar Profesión</option>
        @foreach ($profesiones as $profesion)
            <option value="{{ $profesion->id_profesion }}" {{ $publicacion->id_profesion == $profesion->id_profesion ? 'selected' : '' }}>
                {{ $profesion->nombre_profesion }}
            </option>
        @endforeach
    </select>
    <br><br>
    <label for="fecha">Fecha:</label>
    <input type="date" name="fecha" id="fecha" value="{{ $publicacion->fecha }}">
    <br><br>
    <label for="foto">Foto:</label>
    <br>
    <img src="{{ asset('storage/' . $publicacion->foto_portada) }}" alt="Foto de la publicación" style="max-width:200px;">
    <br>
    <input type="file" name="foto_portada" accept="image/*">
    <br><br>

    <input type="submit" value="Modificar publicación" class="boton">
</form>
@endsection
