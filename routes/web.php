<?php

use App\Http\Controllers\indexController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\usuarioController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\RegistroController;
use Illuminate\Support\Facades\Route;


Route::get('index', indexController::class)->name('index');

Route::get('perfil', function(){
    return "Este es el perfil";
});

Route::get('grafico', function(){
    return "Acá tiene que aparecer un gráfico (mejor si anda)";
});

//----------- USUARIO ---------------//

Route::get('inicioSesion', function () {
    return view('laburapp.inicioSesion');
})->name('inicioSesion');

Route::post('inicioSesion', [loginController::class, 'autenticar'])->name('inicioSesion.usuario');


Route::get('registroUsuario', [RegistroController::class, 'formularioRegistro'])->name('registro.formulario');
Route::post('registroUsuario', [RegistroController::class, 'guardarUsuario'])->name('registro.guardar');

Route::get('modificarUsuario', [usuarioController::class,'modificar'] );


Route::get('solicitudes', function(){
    return "Acá aparecerán tus solicitudes";
});

Route::get('publicaciones', function(){
    return "Acá están las publicaciones";
});

Route::get('modificarPublicaciones', function(){
    return "Modificar publicación";
});

Route::get('buscarPublicaciones', function(){
    return "Acá están las publicaciones";
});

Route::get('crearPublicacion', function(){
    return "Crear publicación";
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
