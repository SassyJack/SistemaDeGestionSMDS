<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Contrato
 * 
 * @property int $id_contrato
 * @property string $numero_contrato
 * @property Carbon|null $fecha_celebracion
 * @property Carbon|null $fecha_expedicion
 * @property int $id_contratista
 * @property int $id_proyecto
 * @property string|null $objeto
 * @property float|null $valor_contrato
 * @property float|null $valor_anticipo
 * @property int|null $duracion
 * @property int|null $id_forma_pago
 * @property int $id_estado
 * 
 * @property Contratista $contratista
 * @property Proyecto $proyecto
 * @property FormasPago|null $formas_pago
 * @property Estado $estado
 *
 * @package App\Models
 */
class Contrato extends Model
{
	protected $table = 'contratos';
	protected $primaryKey = 'id_contrato';
	public $timestamps = false;

	protected $casts = [
		'fecha_celebracion' => 'datetime',
		'fecha_expedicion' => 'datetime',
		'id_contratista' => 'int',
		'id_proyecto' => 'int',
		'valor_contrato' => 'float',
		'valor_anticipo' => 'float',
		'duracion' => 'int',
		'id_forma_pago' => 'int',
		'id_estado' => 'int'
	];

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

	public function contratista()
	{
		return $this->belongsTo(Contratista::class, 'id_contratista');
	}

	public function proyecto()
	{
		return $this->belongsTo(Proyecto::class, 'id_proyecto');
	}

	public function formas_pago()
	{
		return $this->belongsTo(FormasPago::class, 'id_forma_pago');
	}

	public function estado()
	{
		return $this->belongsTo(Estado::class, 'id_estado');
	}
}
