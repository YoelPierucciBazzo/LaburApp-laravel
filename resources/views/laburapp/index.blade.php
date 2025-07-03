@extends('layouts.plantilla')

@section('titulo','Bienvenido a LABURAPP')

    <div class="grupo">
    @section('contenido')
    <main
    class="cabeceraindex">
        <h1 class="titulo">Ponete a laburar</h1>
        <form class="busqueda" action="barra-buscador.php">
            <input class="cajaDeBusqueda" type="search" name="busq" class="caja" placeholder="Busqueda por palabra" required>
            <input class="btn-busqueda" type="submit" value="Enviar" class="boton" name="Enviar">
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
    