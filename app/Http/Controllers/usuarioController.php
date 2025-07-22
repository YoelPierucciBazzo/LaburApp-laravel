<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class usuarioController extends Controller
{
        public function registro()
    {
        return view('laburapp.registroUsuario');
    }

        public function inicioSesion()
    {
        return view('laburapp.inicioSesion');
        
    }

        public function modificar()
    {
        return view('laburapp.modificarUsuario');
    }

}
