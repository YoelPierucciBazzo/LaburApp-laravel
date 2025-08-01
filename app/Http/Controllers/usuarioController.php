<?php

namespace App\Http\Controllers;
use App\Models\Localidad;

use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class usuarioController extends Controller
{
    public function modificar(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'foto_perfil' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'informacion' => 'nullable|string|max:500',
            'telefono' => 'nullable|string|max:15',
            'domicilio' => 'nullable|string|max:255',
            'mail' => 'required|email|max:255',
            'id_localidad' => 'required|exists:localidades,id_localidad',
            'nueva-contraseña' => 'nullable|string|confirmed',
        ]);

        /** @var \App\Models\Usuario $usuario */
        $usuario = Auth::user();

        $usuario->update($request->only([
            'nombre',
            'apellido',
            'informacion',
            'telefono',
            'domicilio',
            'mail',
            'id_localidad',
        ]));
        
                if ($request->filled('nueva-contraseña')) {
                    $usuario->contraseña = Hash::make($request->input('nueva-contraseña'));
                    $usuario->save();
                }

        if ($request ->hasFile('foto_perfil')) {
            $ruta = $request->file('foto_perfil')->store('imagenes','public');
            $usuario->foto_perfil = $ruta;
            $usuario->save();
        }

        return redirect()->route('perfil')->with('success', 'Usuario modificado correctamente.');
    } 
    
    public function editarPerfil() {
    $localidades = Localidad::all();
    $usuario = auth::user();
    return view('laburapp.modificarUsuario', compact('usuario', 'localidades'));;
}
    public function eliminarPerfil(){
        /** @var \App\Models\Usuario $usuario */
        $usuario = auth::user();
        auth::logout();
        $usuario ->delete();
        return redirect()->route('index')->with('success', 'Cuenta eliminada correctamente.');
    }
    
}