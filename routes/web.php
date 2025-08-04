<?php

use App\Http\Controllers\indexController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\usuarioController;
use App\Http\Controllers\publicacionController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\RegistroController;
use Illuminate\Support\Facades\Route;


Route::get('/', indexController::class)->name('index');

Route::get('perfil', function(){return view("laburapp.perfil");})->name('perfil');


//----------- USUARIO ---------------//
Route::get('inicioSesion', function () {return view('laburapp.inicioSesion');})->name('inicioSesion.form');
Route::post('inicioSesion', [loginController::class, 'autenticar'])->name('inicioSesion.usuario');
Route::get('cerrarSesion', [loginController::class, 'cerrarSesion'])->name('cerrarSesion.usuario');


Route::get('registroUsuario', [RegistroController::class, 'formularioRegistro'])->name('registro.formulario');
Route::post('registroUsuario', [RegistroController::class, 'guardarUsuario'])->name('registro.guardar');

Route::get('modificarUsuario', [usuarioController::class, 'editarPerfil'])->name('formulario.modificar');
Route::post('modificarUsuario', [usuarioController::class, 'modificar'])->name('actualizar.usuario');
Route::post('eliminarUsuario', [usuarioController::class, 'eliminarPerfil'])->name('eliminar.usuario');

//----------- PUBLICACIONES ---------------//
Route::get('publicaciones', [publicacionController::class, 'verFormulario'])->name('formulario.publicacion');
Route::post('publicaciones', [publicacionController::class, 'crearPublicacion'])->name('crear.publicacion');
Route::get('misPublicaciones', [publicacionController::class, 'misPublicaciones'])->name('misPublicaciones');
Route::post('eliminarPublicacion/{id}', [publicacionController::class, 'eliminarPublicacion'])->name('eliminar.publicacion');

Route::get('modificarPublicaciones/{id}', [publicacionController::class, 'cargarFormularioModificar'])->name('formulario.modificar.publicacion');
Route::post('modificarPublicaciones/{id}', [publicacionController::class, 'modificarPublicacion'])->name('modificar.publicacion');


Route::get('solicitudes', function(){
    return "Acá aparecerán tus solicitudes";
});


Route::get('buscarPublicaciones', [publicacionController::class , 'buscarPublicaciones'])->name('buscar.publicaciones');

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
