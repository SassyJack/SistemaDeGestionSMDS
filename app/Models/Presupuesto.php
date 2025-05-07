<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Presupuesto
 * 
 * @property int $id_presupuesto
 * @property int $id_proyecto
 * @property string|null $actividad
 * @property string|null $producto
 * @property string|null $numero_disponibilidad
 * @property string|null $codigo_rubro
 * 
 * @property Proyecto $proyecto
 * @property Rubro|null $rubro
 *
 * @package App\Models
 */
class Presupuesto extends Model
{
	protected $table = 'presupuesto';
	protected $primaryKey = 'id_presupuesto';
	public $timestamps = false;

	protected $casts = [
		'id_proyecto' => 'int'
	];

	protected $fillable = [
		'id_proyecto',
		'actividad',
		'producto',
		'numero_disponibilidad',
		'codigo_rubro'
	];

	public function proyecto()
	{
		return $this->belongsTo(Proyecto::class, 'id_proyecto');
	}

	public function rubro()
	{
		return $this->belongsTo(Rubro::class, 'codigo_rubro');
	}
}
