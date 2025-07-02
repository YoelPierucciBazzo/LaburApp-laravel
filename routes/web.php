<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return "Holis";
});

Route::get('perfil', function(){
    return "Este es el perfil";
});

Route::get('grafico', function(){
    return "Acá tiene que aparecer un gráfico (mejor si anda)";
});

Route::get('sesion', function(){
    return "Inicio de sesión";
});

Route::get('registroUsuario', function(){
    return "Registro de usuario";
});

Route::get('modificarUsuario', function(){
    return "Modificar usuario";
});

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
