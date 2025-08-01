    @extends('layouts.plantilla')
    @section("titulo", "Perfil")

@section('contenido')

<main>
    <div class='barra-arriba'>
    
    @auth
    <div class='bloque-perfil'>
        <img src={{ asset('storage/' . auth()->user()->foto_perfil )}} class='fotoperfil'>
        <input class='boton' type='button' value='Modificar perfil' onClick='location="{{ route('formulario.modificar') }}"'>
        <input class='boton' type='button' value='Ver solicitudes' {{-- onClick='location=\"solicitudes.php\"' --}}>
        <input type="button" class="boton" value="Crear publicación" onClick='location="{{ route('formulario.publicacion') }}"'>
    </div>

    <div class='info' >
        <div class='contenedor-datos'><h2>Nombre</h2><p>{{  auth()->user()->nombre }} {{  auth()->user()->apellido}}</></p> </div>
        <div class='contenedor-datos'><h2>Información</h2> <p>{{auth()->user()->informacion}}</p></div>
        <div class='contenedor-datos'> <h4>Número de Teléfono:</h4><p>{{auth()->user()->telefono}}</p></div>
        <div class='contenedor-datos'> <h4>Domicilio</h4> <p>{{ auth()->user()->domicilio }}</p></div>
        <div class='contenedor-datos'> <h4>Mail</h4> <p>{{ auth()->user()->mail }}</p></div>
        <div class='contenedor-datos'> <h4>Localidad</h4> <p>{{ auth()->user()->localidad->nombre_localidad }}</p></div>
    
    </div>
    </div>
    
    @endauth
    @guest
        <p>No hay usuario logueado, inicia sesión</p>
    @endguest
    

</main>
    
    
@endsection



<!-- namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class PerfilController extends Controller
{
    public function index(Request $request)
    {
        // Si el usuario está autenticado, marcamos la sesión como iniciada (valor 1)
        if (Auth::check()) {
            if (!Session::has('contador')) {
                Session::put('contador', 1); // Solo se pone una vez
            }

            $usuario = Auth::user();

            return view('laburapp.perfil', [
                'usuario' => $usuario,
                'contador' => Session::get('contador')
            ]);
        } else {
            // Si no hay sesión iniciada, aseguramos que el contador no exista
            Session::forget('contador');

            return view('laburapp.perfil', [
                'contador' => 0
            ]);
        }
    }
}
 -->
{{-- --BLADE--
@extends('layouts.app')

@section('content')
    @if($contador == 1 && isset($usuario))
        <h1>Bienvenido, {{ $usuario->name }}</h1>
        <p>Tu sesión está activa.</p>
    @else
        <h1>No tienes una sesión iniciada.</h1>
        <p><a href="{{ route('login') }}">Inicia sesión</a> para ver tu perfil.</p>
    @endif
@endsection --}}