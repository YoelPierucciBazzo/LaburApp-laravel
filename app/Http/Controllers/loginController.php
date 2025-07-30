<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class loginController extends Controller
{
    public function autenticar(Request $request)
    {
        $mail = $request->input('mail');
        $pass = $request->input('pass');

        $usuario = Usuario::where('mail', $mail)->first();

        if ($usuario && hash::check($pass, $usuario->contraseña)) {
            Auth::login($usuario);
            
            return redirect()->route('index')->with('success', 'Inicio de sesión exitoso. Bienvenido, ' . $usuario->nombre . ' ' . $usuario->apellido . '!');
        } else {
            return redirect()->route('inicioSesion')->withErrors(['inicioSesion' => 'Usuario o contraseña incorrectos.']);
        }
    }

    function cerrarSesion()
    {
        Auth::logout();
        return redirect()->route('index')->with('success', 'Sesión cerrada exitosamente.');
    }
}