@extends('layouts.plantilla')
@section('titulo','Bienvenido a LABURAPP')

@if (session('success'))
    <div style="background-color: #d4edda; color: #155724; padding: 10px; border-radius: 5px; margin-bottom: 10px;">
        {{ session('success') }}
    </div>
@endif


    <div class="grupo">
    @section('contenido')
    <main
    class="cabeceraindex">
        <h1 class="titulo">Ponete a laburar</h1>
        <form class="busqueda" action="{{route('buscar.publicaciones')}}" method="GET">
            <input class="cajaDeBusqueda" type="search" name="busq" class="caja" placeholder="Busqueda por palabra" required>
            <input class="btn-busqueda" type="submit" value="Enviar" class="boton" onclick="location.href='{{ route('buscar.publicaciones') }}'">
        </form>
    </div>
    <div class="seccion">
        <div class="publicaciones"> 
        </div>
        <div class="paginacion">
        </div>
    </div>
    </main> 
    @endsection
    