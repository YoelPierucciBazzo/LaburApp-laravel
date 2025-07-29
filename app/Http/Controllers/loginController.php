<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;

use Illuminate\Http\Request;

class loginController extends Controller
{
    public function autenticar(Request $request)
    {
        $mail = $request->input('mail');
        $pass = $request->input('pass');

        $usuario = DB::table('usuarios')
            ->where('mail', $mail)
            ->first();

        if ($usuario && hash::check($pass, $usuario->contraseña)) {
            Session::put('nombre', $usuario->nombre);
            Session::put('apellido', $usuario->apellido);
            Session::put('contador', 1);
            Session::put('id_usuario', $usuario->id_usuario);
            Session::put('info-foto-perfil', $usuario->foto_perfil);
            Session::put('contador-fotoperfil', 1);
            
            return redirect()->route('index')->with('success', 'Inicio de sesión exitoso. Bienvenido, ' . $usuario->nombre . ' ' . $usuario->apellido . '!');
        } else {
            return redirect()->route('inicioSesion')->withErrors(['inicioSesion' => 'Usuario o contraseña incorrectos.']);
        }
    }

    function cerrarSesion()
    {
        Session::flush();
        return redirect()->route('index')->with('success', 'Sesión cerrada exitosamente.');
    }
}