<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuarios'; // Nombre de la tabla en la base de datos
    protected $primaryKey = 'id_usuario'; // Clave primaria de la tabla
    public $timestamps = false; // Desactivar los timestamps si no se usan

    // Definir las columnas que se pueden asignar masivamente
    protected $fillable = [
        'nombre',
        'apellido',
        'contraseña',
        'mail',
        'telefono',
        'id_localidad',
        'foto_perfil'
    ];
}
