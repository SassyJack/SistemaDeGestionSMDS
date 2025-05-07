<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class HistorialCambio
 * 
 * @property int $id_cambio
 * @property int $id_proyecto
 * @property int $id_usuario
 * @property Carbon $fecha
 * @property string|null $cambio
 * 
 * @property Proyecto $proyecto
 * @property Usuario $usuario
 *
 * @package App\Models
 */
class HistorialCambio extends Model
{
	protected $table = 'historial_cambios';
	protected $primaryKey = 'id_cambio';
	public $timestamps = false;

	protected $casts = [
		'id_proyecto' => 'int',
		'id_usuario' => 'int',
		'fecha' => 'datetime'
	];

	protected $fillable = [
		'id_proyecto',
		'id_usuario',
		'fecha',
		'cambio'
	];

	public function proyecto()
	{
		return $this->belongsTo(Proyecto::class, 'id_proyecto');
	}

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'id_usuario');
	}
}
