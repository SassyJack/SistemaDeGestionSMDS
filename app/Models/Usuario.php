<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuario';
    public $timestamps = false;
    
    protected $fillable = [
        'nombre',
        'contrasena',
        'fecha_creacion',
        'id_estado',
        'id_rol'
    ];

    protected $hidden = [
        'contrasena'
    ];

    public function estado()
    {
        return $this->belongsTo(Estado::class, 'id_estado', 'id_estado');
    }
    
    public function rol()
    {
        return $this->belongsTo(Role::class, 'id_rol', 'id_rol');
    }

    public function getAuthPassword()
    {
        return $this->contrasena;
    }
}