<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SeguimientoProyecto extends Model
{
    protected $table = 'seguimiento_proyectos';
    protected $primaryKey = 'id_seguimiento';
    public $timestamps = false;

    protected $fillable = [
        'id_proyecto',
        'id_interventor',
        'id_usuario',
        'descripcion',
        'porcentaje_avance',
        'fecha_modificacion'
    ];

    // Relaciones
    public function proyecto()
    {
        return $this->belongsTo(Proyecto::class, 'id_proyecto');
    }

    public function interventor()
    {
        return $this->belongsTo(Interventor::class, 'id_interventor');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }
}