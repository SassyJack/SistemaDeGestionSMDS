<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Naturaleza extends Model
{
    protected $table = 'naturaleza';
    protected $primaryKey = 'id_naturaleza';
    public $timestamps = false;
    protected $fillable = [
        'nombre',
        'descripcion'
    ];
}