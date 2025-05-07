<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Rubro
 * 
 * @property string $codigo_rubro
 * @property int|null $id_tipo_rubro
 * @property string|null $descripcion
 * 
 * @property TipoRubro|null $tipo_rubro
 * @property Collection|Presupuesto[] $presupuestos
 *
 * @package App\Models
 */
class Rubro extends Model
{
	protected $table = 'rubros';
	protected $primaryKey = 'codigo_rubro';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_tipo_rubro' => 'int'
	];

	protected $fillable = [
		'id_tipo_rubro',
		'descripcion'
	];

	public function tipo_rubro()
	{
		return $this->belongsTo(TipoRubro::class, 'id_tipo_rubro');
	}

	public function presupuestos()
	{
		return $this->hasMany(Presupuesto::class, 'codigo_rubro');
	}
}
