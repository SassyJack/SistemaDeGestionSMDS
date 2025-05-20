<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LineaBase extends Model
{
    protected $table = 'lineas_base';
    protected $primaryKey = 'id_linea_base';
    public $timestamps = false;
    protected $fillable = [
        'nombre',
        'Linea_base'
    ];
}