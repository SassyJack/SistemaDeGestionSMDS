<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormaPago extends Model
{
    protected $table = 'formas_pago';
    protected $primaryKey = 'id_forma_pago';
    public $timestamps = false;
    
    protected $fillable = [
        'nombre',
        'descripcion'
    ];
}