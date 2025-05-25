<?php

namespace App\Observers;

use App\Models\Proyecto;
use App\Models\HistorialCambio;
use Illuminate\Support\Facades\Auth;

class ProyectoObserver
{
    /**
     * Handle the Proyecto "updated" event.
     *
     * @param  \App\Models\Proyecto  $proyecto
     * @return void
     */
    public function updated(Proyecto $proyecto)
    {
        $cambios = [];
        $original = $proyecto->getOriginal();
        
        foreach ($proyecto->getDirty() as $atributo => $valor) {
            if ($atributo !== 'updated_at') {
                $cambios[] = "Campo '{$atributo}' cambió de '{$original[$atributo]}' a '{$valor}'";
            }
        }
        
        if (!empty($cambios)) {
            HistorialCambio::create([
                'id_proyecto' => $proyecto->id_proyecto,
                'id_usuario' => Auth::id(),
                'fecha' => now(),
                'cambio' => "Se modificó el proyecto: " . implode(", ", $cambios)
            ]);
        }
    }
}