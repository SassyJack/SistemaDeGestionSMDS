<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    protected $table = 'sectores';
    protected $primaryKey = 'id_sector';
    
    protected $fillable = [
        'nombre',
        'descripcion'
    ];
}