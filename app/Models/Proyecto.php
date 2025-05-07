<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Proyecto
 * 
 * @property int $id_proyecto
 * @property string $titulo
 * @property string|null $descripcion
 * @property Carbon|null $fecha_inicio
 * @property Carbon|null $fecha_fin
 * @property float|null $presupuesto
 * @property int $id_estado
 * @property int $id_entidad
 * @property int $id_responsable
 * 
 * @property Estado $estado
 * @property Entidade $entidade
 * @property Usuario $usuario
 * @property Collection|Contrato[] $contratos
 * @property Collection|HistorialCambio[] $historial_cambios
 * @property Collection|Presupuesto[] $presupuestos
 * @property Collection|SeguimientoProyecto[] $seguimiento_proyectos
 *
 * @package App\Models
 */
class Proyecto extends Model
{
	protected $table = 'proyectos';
	protected $primaryKey = 'id_proyecto';
	public $timestamps = false;

	protected $casts = [
		'fecha_inicio' => 'datetime',
		'fecha_fin' => 'datetime',
		'presupuesto' => 'float',
		'id_estado' => 'int',
		'id_entidad' => 'int',
		'id_responsable' => 'int'
	];

	protected $fillable = [
		'titulo',
		'descripcion',
		'fecha_inicio',
		'fecha_fin',
		'presupuesto',
		'id_estado',
		'id_entidad',
		'id_responsable'
	];

	public function estado()
	{
		return $this->belongsTo(Estado::class, 'id_estado');
	}

	public function entidade()
	{
		return $this->belongsTo(Entidade::class, 'id_entidad');
	}

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'id_responsable');
	}

	public function contratos()
	{
		return $this->hasMany(Contrato::class, 'id_proyecto');
	}

	public function historial_cambios()
	{
		return $this->hasMany(HistorialCambio::class, 'id_proyecto');
	}

	public function presupuestos()
	{
		return $this->hasMany(Presupuesto::class, 'id_proyecto');
	}

	public function seguimiento_proyectos()
	{
		return $this->hasMany(SeguimientoProyecto::class, 'id_proyecto');
	}
}
