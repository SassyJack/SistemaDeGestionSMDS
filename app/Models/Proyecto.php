<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    protected $table = 'proyectos';
    protected $primaryKey = 'id_proyecto';
    public $timestamps = false;

    protected $fillable = [
        'titulo',
        'actividad',
        'fecha_inicio',
        'fecha_fin',
        'presupuesto',
        'codigo_SSEPI',
        'id_estado',
        'id_naturaleza',
        'codigo_rubro',
        'id_sector',
        'id_linea_base'
    ];

    // Relaciones
    public function estado()
    {
        return $this->belongsTo(Estado::class, 'id_estado');
    }

    public function naturaleza()
    {
        return $this->belongsTo(Naturaleza::class, 'id_naturaleza');
    }

    public function sector()
    {
        return $this->belongsTo(Sector::class, 'id_sector');
    }

    public function lineaBase()
    {
        return $this->belongsTo(LineaBase::class, 'id_linea_base');
    }
    public function rubro()
    {
        return $this->belongsTo(Rubro::class, 'codigo_rubro');
    }
}