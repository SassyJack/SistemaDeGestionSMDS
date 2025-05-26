<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rubro extends Model
{
    protected $table = 'rubros';
    protected $primaryKey = 'codigo_rubro';
    protected $keyType = 'integer';
    public $timestamps = false;

    protected $fillable = [
        'codigo_rubro',
        'nombre',
        'descripcion'
    ];
}

class TipoRubro extends Model
{
    protected $table = 'tipo_rubros';
    protected $primaryKey = 'id_tipo_rubro';
    protected $keyType = 'integer';
    public $timestamps = false;

    protected $fillable = [
        'id_tipo_rubro',
        'descripcion'
    ];

    public function tipoRubro()
    {
        return $this->belongsTo(TipoRubro::class, 'id_tipo_rubro', 'id_tipo_rubro');
    }
}