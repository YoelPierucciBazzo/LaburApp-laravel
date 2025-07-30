<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;


class PerfilController extends Controller
{

public function perfil()
{
    $usuario = Auth::user(); // O cargar relaciones: ->with('posts')->first()
    return view('perfil', compact('usuario'));
}


}

?>
