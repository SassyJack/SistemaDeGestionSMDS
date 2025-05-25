<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    protected $table = 'contratos';
    protected $primaryKey = 'id_contrato';
    public $timestamps = false;

    protected $fillable = [
        'numero_contrato',
        'fecha_celebracion',
        'fecha_expedicion',
        'id_contratista',
        'id_proyecto',
        'objeto',
        'valor_contrato',
        'valor_anticipo',
        'duracion',
        'id_forma_pago',
        'id_estado'
    ];

    // Relaciones
    public function contratista()
    {
        return $this->belongsTo(Contratista::class, 'id_contratista');
    }

    public function proyecto()
    {
        return $this->belongsTo(Proyecto::class, 'id_proyecto');
    }

    public function formaPago()
    {
        return $this->belongsTo(FormaPago::class, 'id_forma_pago');
    }

    public function estado()
    {
        return $this->belongsTo(Estado::class, 'id_estado');
    }
}