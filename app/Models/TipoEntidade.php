<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TipoEntidade
 * 
 * @property int $id_tipo_entidad
 * @property string $nombre
 * @property string|null $descripcion
 * 
 * @property Collection|EntidadesTipo[] $entidades_tipos
 *
 * @package App\Models
 */
class TipoEntidade extends Model
{
	protected $table = 'tipo_entidades';
	protected $primaryKey = 'id_tipo_entidad';
	public $timestamps = false;

	protected $fillable = [
		'nombre',
		'descripcion'
	];

	public function entidades_tipos()
	{
		return $this->hasMany(EntidadesTipo::class, 'id_tipo_entidad');
	}
}
