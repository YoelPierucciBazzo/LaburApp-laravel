<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Publicacion;
use Illuminate\Http\Request;
use App\Models\Profesion;
use Illuminate\Support\Facades\Storage;
use App\Models\Usuario;

class publicacionController extends Controller
{
    public function verFormulario() {
    $profesiones = Profesion::all();
    return view('laburapp.crearPublicacion', compact('profesiones'));
}

public function misPublicaciones() {
    $publicaciones = Publicacion::where('id_usuario', Auth::user()->id_usuario)->with('profesion')->get();
    return view('laburapp.misPublicaciones', compact('publicaciones'));}

    public function crearPublicacion(Request $request){
        $request -> validate([
        'nombre_publicacion' => 'required|string|max:255',
        'descripcion' => 'required|string|max:1000',
        'fecha' => 'required|date',
        'foto_portada' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        'id_profesion' => 'required|exists:profesiones,id_profesion',
        ]);

        if ($request->hasFile('foto_portada')) {
        $imagenPath = $request->file('foto_portada')->store('imagenes', 'public');
    } else {
        return redirect()->back()->withErrors(['foto_portada' => 'Debe subir una imagen válida']);
    }


        Publicacion::create([
        'nombre_publicacion' =>$request->nombre_publicacion,
        'descripcion'=>$request->descripcion,
        'fecha'=>$request->fecha,
        'foto_portada'=>$imagenPath,
        'id_usuario'=>Auth::user()->id_usuario,
        'id_profesion'=>$request->id_profesion,
        ]);

        return redirect()->route('misPublicaciones')->with('success', 'Publicación creada correctamente');
    }

    // Método para eliminar una publicación
    
public function eliminarPublicacion($id)
{
    $publicacion = Publicacion::findOrFail($id);
    $usuario = Auth::user();
    if ($publicacion->id_usuario !== $usuario->id_usuario) {
        return redirect()->back()->withErrors(['error' => 'No tienes permiso para eliminar esta publicación.']);
    }

    if ($publicacion->foto_portada && Storage::disk('public')->exists($publicacion->foto_portada)) {
        Storage::disk('public')->delete($publicacion->foto_portada);
    }

    $publicacion->delete();

    return redirect()->route('misPublicaciones')->with('success', 'Publicación eliminada correctamente.');
    
}
}



