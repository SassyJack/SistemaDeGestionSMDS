<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuario';
    
    protected $fillable = [
        'nombre',
        'contrasena',
        'fecha_creacion',
        'id_estado'
    ];

    protected $hidden = [
        'contrasena'
    ];

    public function estado()
    {
        return $this->belongsTo(Estado::class, 'id_estado', 'id_estado');
    }

    public function getAuthPassword()
    {
        return $this->contrasena;
    }
}