<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contratista extends Model
{
    protected $table = 'contratistas';
    protected $primaryKey = 'id_contratista';
    public $timestamps = false;

    protected $fillable = [
        'id_persona',
        'razon_social'
    ];

    public function persona()
    {
        return $this->belongsTo(Persona::class, 'id_persona');
    }
}