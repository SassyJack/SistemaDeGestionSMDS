<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class NombresMeta
 * 
 * @property int $id_nombre_meta
 * @property string $nombre
 * @property string|null $meta_programa
 * 
 * @property Collection|SeguimientoProyecto[] $seguimiento_proyectos
 *
 * @package App\Models
 */
class NombresMeta extends Model
{
	protected $table = 'nombres_metas';
	protected $primaryKey = 'id_nombre_meta';
	public $timestamps = false;

	protected $fillable = [
		'nombre',
		'meta_programa'
	];

	public function seguimiento_proyectos()
	{
		return $this->hasMany(SeguimientoProyecto::class, 'id_nombre_meta');
	}
}
