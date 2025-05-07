<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SeguimientoProyecto
 * 
 * @property int $id_seguimiento
 * @property int $id_proyecto
 * @property int $id_interventor
 * @property int $id_usuario
 * @property string|null $descripcion
 * @property int|null $id_nombre_meta
 * @property int|null $id_meta_programa
 * @property int|null $id_linea_base
 * @property int|null $porcentaje_avance
 * @property Carbon $fecha_modificacion
 * 
 * @property Proyecto $proyecto
 * @property Interventore $interventore
 * @property Usuario $usuario
 * @property NombresMeta|null $nombres_meta
 *
 * @package App\Models
 */
class SeguimientoProyecto extends Model
{
	protected $table = 'seguimiento_proyectos';
	protected $primaryKey = 'id_seguimiento';
	public $timestamps = false;

	protected $casts = [
		'id_proyecto' => 'int',
		'id_interventor' => 'int',
		'id_usuario' => 'int',
		'id_nombre_meta' => 'int',
		'id_meta_programa' => 'int',
		'id_linea_base' => 'int',
		'porcentaje_avance' => 'int',
		'fecha_modificacion' => 'datetime'
	];

	protected $fillable = [
		'id_proyecto',
		'id_interventor',
		'id_usuario',
		'descripcion',
		'id_nombre_meta',
		'id_meta_programa',
		'id_linea_base',
		'porcentaje_avance',
		'fecha_modificacion'
	];

	public function proyecto()
	{
		return $this->belongsTo(Proyecto::class, 'id_proyecto');
	}

	public function interventore()
	{
		return $this->belongsTo(Interventore::class, 'id_interventor');
	}

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'id_usuario');
	}

	public function nombres_meta()
	{
		return $this->belongsTo(NombresMeta::class, 'id_nombre_meta');
	}
}
