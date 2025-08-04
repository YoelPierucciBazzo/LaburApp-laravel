    @extends('layouts.plantilla')
    @section("titulo", "Perfil")

@section('contenido')

<main>
    <div class='barra-arriba'>
    
    @auth
    
 {{-- <div class='bloque-perfil'>
        <img src={{ asset('storage/' . $usuario->foto_perfil )}} class='fotoperfil'>
        <input class='boton' type='button' value='Modificar perfil' onClick='location="{{ route('formulario.modificar') }}"'>
        <input class='boton' type='button' value='Ver solicitudes' onClick='location=\"solicitudes.php\"'>
        <input type="button" class="boton" value="Crear publicación" onClick='location="{{ route('formulario.publicacion') }}"'>
    </div>  --}}
    <div class='info' >
        <img src={{ asset('storage/' . $usuario->foto_perfil )}} class='fotoperfil'>
        <div class='contenedor-datos'><h2>Nombre</h2><p>{{  $usuario->nombre }} {{  $usuario->apellido}}</></p> </div>
        <div class='contenedor-datos'><h2>Información</h2> <p>{{$usuario->informacion}}</p></div>
        <div class='contenedor-datos'> <h4>Número de Teléfono:</h4><p>{{$usuario->telefono}}</p></div>
        <div class='contenedor-datos'> <h4>Domicilio</h4> <p>{{ $usuario->domicilio }}</p></div>
        <div class='contenedor-datos'> <h4>Mail</h4> <p>{{ $usuario->mail }}</p></div>
        <div class='contenedor-datos'> <h4>Localidad</h4> <p>{{ $usuario->localidad->nombre_localidad }}</p></div>
    </div>
    </div>
    
    @endauth
    @guest
        <p>No hay usuario logueado, inicia sesión</p>
    @endguest
    

</main>
    
    
@endsection