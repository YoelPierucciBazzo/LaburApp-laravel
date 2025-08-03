@extends('layouts.plantilla') 
@section('titulo', 'Mis Publicaciones')

@section('contenido')
    <h1>Mis publicaciones</h1>

    @if ($publicaciones->isEmpty())
        <p>No tenés publicaciones todavía.</p>
    @else
        <ul>
            @foreach ($publicaciones as $publicacion)
                <li>
                    <h2 class="publicaciones">{{ $publicacion->nombre_publicacion}}</h2>
                    <h2 class="publicaciones">{{ $publicacion->descripcion }}</h2>
                    <h2 class="publicaciones">{{ $publicacion->profesion->nombre_profesion ?? 'Sin profesión' }}</h2>
                    <img src="{{ asset('storage/' . $publicacion->foto_portada) }}" alt="Imagen" width="150" id="fotopubli">
                    <input type="button" class="boton" value="Modificar publicación" onclick="location.href='{{ route('formulario.modificar.publicacion', $publicacion->id_publicaciones) }}'">
                    <form action="{{ route('eliminar.publicacion', $publicacion->id_publicaciones) }}" method="POST" onsubmit="return confirm('¿Seguro que querés eliminar la publicación?')">
                        @csrf
                        <button type="submit" class="boton">Eliminar publicacion</button>
                    </form>
                </li>
                <hr>
            @endforeach
            </div>
        </ul>
    @endif
@endsection