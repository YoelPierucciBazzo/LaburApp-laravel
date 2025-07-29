<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuario'; // 👈 importante si tu clave primaria no se llama 'id'

    protected $fillable = [
        'nombre',
        'apellido',
        'mail',
        'domicilio',
        'foto_perfil',
        'contraseña',
        'telefono',
        'informacion',
        'id_localidad',
        'id_rating'
    ];

    public $timestamps = true; // ya que tenés created_at y updated_at
}
