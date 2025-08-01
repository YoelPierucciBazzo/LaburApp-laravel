<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
    protected $table = 'publicaciones';
    protected $primaryKey = 'id_publicaciones';

    protected $fillable = [
        'nombre_publicacion',
        'descripcion',
        'fecha',
        'foto_portada',
        'id_usuario',
        'id_profesion'
    ];

    public $timestamps = true;

    public function profesion()
{
    return $this->belongsTo(Profesion::class, 'id_profesion', 'id_profesion');
}
}
