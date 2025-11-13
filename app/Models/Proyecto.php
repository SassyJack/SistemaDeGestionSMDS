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
        'codigo_ssepi',
        'id_estado',
        'id_naturaleza',
        'codigo_rubro',
        'id_sector',
        'id_linea_base'
    ];

    /**
     * Accessor & mutator compatibility for code that uses the old attribute name
     * `codigo_SSEPI` (with uppercase). PostgreSQL column names are lowercase by
     * default, so we map the legacy attribute to the real column `codigo_ssepi`.
     */
    public function setCodigoSSEPIAttribute($value)
    {
        $this->attributes['codigo_ssepi'] = $value;
    }

    public function getCodigoSSEPIAttribute()
    {
        return $this->attributes['codigo_ssepi'] ?? null;
    }

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