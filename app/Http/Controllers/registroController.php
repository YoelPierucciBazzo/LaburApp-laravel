<?php
/*
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Usuario;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class registroController extends Controller
{
public function formularioRegistro()
{
    $localidades = DB::table('localidades')->orderBy('id_localidad')->get();
    return view('laburapp.registroUsuario', compact('localidades'));
}



public function registrar(Request $request)
{
    dd($request->all()); // Para depurar y ver los datos recibidos
    $request->validate([
        'nombre' => 'required',
        'apellido' => 'required',
        'pass' => 'required|min:4|max:10',
        'mail' => 'required|email',
        'telefono' => 'required',
        'id_localidad' => 'required',
        'foto_perfil' => 'required|image|mimes:jpg,jpeg|max:2048', 
    ]);

    $mail = $request->mail;

    $usuarioExistente = DB::table('usuarios')->where('mail', $mail)->exists();

    if ($usuarioExistente) {
        return redirect()->route('registro.form')->withErrors(['mail' => 'El usuario ya está registrado.']);
    }

    $nombre = $request->nombre;
    $apellido = $request->apellido;
    $pass = $request->pass; // Ideal: usar Hash::make($pass)
    $telefono = $request->telefono;
    $localidad = $request->localidad;

    // Procesar imagen
    $imagen = $request->file('imagen');
    $nombreArchivo = '-' . $nombre . '-' . $apellido . '.' . $imagen->getClientOriginalExtension();
    $ruta = 'imagenes/fotos_perfiles/' . $nombreArchivo;
    $imagen->move(public_path('imagenes/fotos_perfiles'), $nombreArchivo);

    // Insertar en base de datos
    Usuario::create([
        'nombre' => $request -> $nombre,
        'apellido' => $request ->$apellido,
        'contraseña' => bcrypt($request -> $pass),
        'mail' => $request ->  $mail,
        'telefono' => $request -> $telefono,
        'id_localidad' => $request-> $localidad,
        'foto_perfil' => $ruta,
    ]);

    // Obtener el usuario recién creado
    $usuario = DB::table('usuarios')->where('mail', $mail)->first();

    // Crear sesión
    Session::put('nombre', $usuario->nombre);
    Session::put('apellido', $usuario->apellido);
    Session::put('pass', $usuario->contraseña);
    Session::put('contador', 1);
    Session::put('id_usuario', $usuario->id_usuario);
    Session::put('info-foto-perfil', $usuario->foto_perfil);
    Session::put('contador-fotoperfil', 1);

    return redirect()->route('index')->with('success', 'Usuario registrado con éxito.');
}
}
// End of registroController.php
*/
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Storage;

class RegistroController extends Controller
{
    public function index()
    {
        return view('laburapp.inicioSesion');
    }

    public function create()
    {
            $localidades = DB::table('localidades')->orderBy('id_localidad')->get();
             return view('laburapp.registroUsuario', compact('localidades'));
    }

    public function store(Request $request)
    {
        // Validación básica
        $request->validate([
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'pass' => 'required|string|min:4|max:10',
            'mail' => 'required|email|unique:usuarios,mail',
            'telefono' => 'required|string',
            'localidad' => 'required|numeric',
            'imagen' => 'required|image|mimes:jpeg,jpg|max:2048',
        ]);

        // Guardar la imagen
        $ruta = $request->file('imagen')->store('public/imagenes');
        $nombreArchivo = basename($ruta);

        // Crear el usuario usando Eloquent
        Usuario::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'contraseña' => $request->pass, // o usar bcrypt() si querés encriptarla
            'mail' => $request->mail,
            'telefono' => $request->telefono,
            'id_localidad' => $request->localidad,
            'foto_perfil' => $nombreArchivo,
        ]);

        // Redirigir con mensaje
        return redirect()->route('inicioSesion')->with('success', 'Usuario creado correctamente.');
    }
}