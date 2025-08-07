<?php
namespace App\Http\Controllers;
use App\Models\Publicacion;

use Illuminate\Http\Request;

class indexController extends Controller
{
    public function verTodasPublicaciones()
    {
        $publicacionesTotales = \App\Models\Publicacion::with('profesion')->orderBy('fecha', 'desc')->paginate(6);
        return view('laburapp.index', compact('publicacionesTotales'));
    }

}
