<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use Notifiable;

    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuario';
    public $timestamps = false;

    protected $casts = [
        'fecha_creacion' => 'datetime',
        'id_estado' => 'int'
    ];

    protected $hidden = [
        'contrasena',
    ];

    public function getAuthPassword()
    {
        return $this->contrasena;
    }

    protected $fillable = [
        'nombre',
        'contrasena',
        'fecha_creacion',
        'id_estado'
    ];

    public function estado()
    {
        return $this->belongsTo(Estado::class, 'id_estado');
    }

    public function contratistas()
    {
        return $this->hasMany(Contratista::class, 'id_usuario');
    }

    public function historial_cambios()
    {
        return $this->hasMany(HistorialCambio::class, 'id_usuario');
    }

    public function interventores()
    {
        return $this->hasMany(Interventore::class, 'id_usuario');
    }

    public function proyectos()
    {
        return $this->hasMany(Proyecto::class, 'id_responsable');
    }

    public function seguimiento_proyectos()
    {
        return $this->hasMany(SeguimientoProyecto::class, 'id_usuario');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'usuarios_roles', 'id_usuario', 'id_rol')
                    ->withPivot('id_usuario_rol', 'fecha_asignacion');
    }
}
