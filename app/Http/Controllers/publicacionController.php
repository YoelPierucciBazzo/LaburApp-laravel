<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class publicacionController extends Controller
{
            public function __invoke()
    {
        return view('laburapp.registroUsuario');
    }
}
