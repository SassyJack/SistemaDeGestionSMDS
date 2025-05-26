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