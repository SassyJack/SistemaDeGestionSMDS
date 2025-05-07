<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Sectore
 * 
 * @property int $id_sector
 * @property string $nombre
 * @property string|null $descripcion
 * 
 * @property Collection|Entidade[] $entidades
 *
 * @package App\Models
 */
class Sectore extends Model
{
	protected $table = 'sectores';
	protected $primaryKey = 'id_sector';
	public $timestamps = false;

	protected $fillable = [
		'nombre',
		'descripcion'
	];

	public function entidades()
	{
		return $this->hasMany(Entidade::class, 'id_sector');
	}
}
