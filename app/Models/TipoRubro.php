<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoRubro extends Model
{
    protected $table = 'tipo_rubros';
    protected $primaryKey = 'id_tipo_rubro';
    public $timestamps = false;
    protected $fillable = [
        'nombre',
        'descripcion'
    ];
}