<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistorialCambio extends Model
{
    protected $table = 'historial_cambios';
    protected $primaryKey = 'id_cambio';
    public $timestamps = false;
    
    protected $fillable = [
        'id_proyecto',
        'id_usuario',
        'fecha',
        'cambio'
    ];
    
    // Relaciones
    public function proyecto()
    {
        return $this->belongsTo(Proyecto::class, 'id_proyecto');
    }
    
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }
}