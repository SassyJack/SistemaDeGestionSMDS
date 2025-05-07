<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Estado
 * 
 * @property int $id_estado
 * @property string $nombre
 * @property string|null $descripcion
 * 
 * @property Collection|Contrato[] $contratos
 * @property Collection|Proyecto[] $proyectos
 * @property Collection|Usuario[] $usuarios
 *
 * @package App\Models
 */
class Estado extends Model
{
	protected $table = 'estados';
	protected $primaryKey = 'id_estado';
	public $timestamps = false;

	protected $fillable = [
		'nombre',
		'descripcion'
	];

	public function contratos()
	{
		return $this->hasMany(Contrato::class, 'id_estado');
	}

	public function proyectos()
	{
		return $this->hasMany(Proyecto::class, 'id_estado');
	}

	public function usuarios()
	{
		return $this->hasMany(Usuario::class, 'id_estado');
	}
}
