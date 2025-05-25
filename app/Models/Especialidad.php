<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especialidad extends Model
{
    use HasFactory;

    protected $table = 'especialidades';
    protected $primaryKey = 'id_especialidad'; // Añadimos esta línea
    public $timestamps = false;
    
    protected $fillable = [
        'nombre',
        'descripcion'
    ];
}