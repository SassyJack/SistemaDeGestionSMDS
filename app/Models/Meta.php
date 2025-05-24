<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meta extends Model
{
    protected $table = 'nombres_metas';
    protected $primaryKey = 'id_nombre_meta';
    public $timestamps = false;
    protected $fillable = [
        'nombre',
        'meta_programa'
    ];
}