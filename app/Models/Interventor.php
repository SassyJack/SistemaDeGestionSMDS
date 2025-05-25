<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Interventor extends Model
{
    protected $table = 'interventores';
    protected $primaryKey = 'id_interventor';
    public $timestamps = false;

    protected $fillable = [
        'id_especialidad',
        'id_persona',
        'nit'
    ];

    public function especialidad()
    {
        return $this->belongsTo(Especialidad::class, 'id_especialidad');
    }

    public function persona()
    {
        return $this->belongsTo(Persona::class, 'id_persona');
    }
}