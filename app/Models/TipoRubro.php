<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TipoRubro
 * 
 * @property int $id_tipo_rubro
 * @property string $nombre
 * @property string|null $descripcion
 * 
 * @property Collection|Rubro[] $rubros
 *
 * @package App\Models
 */
class TipoRubro extends Model
{
	protected $table = 'tipo_rubros';
	protected $primaryKey = 'id_tipo_rubro';
	public $timestamps = false;

	protected $fillable = [
		'nombre',
		'descripcion'
	];

	public function rubros()
	{
		return $this->hasMany(Rubro::class, 'id_tipo_rubro');
	}
}
