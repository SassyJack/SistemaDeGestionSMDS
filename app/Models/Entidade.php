<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Entidade
 * 
 * @property int $id_entidad
 * @property string $nombre
 * @property int|null $id_sector
 * 
 * @property Sectore|null $sectore
 * @property Collection|EntidadesTipo[] $entidades_tipos
 * @property Collection|Proyecto[] $proyectos
 *
 * @package App\Models
 */
class Entidade extends Model
{
	protected $table = 'entidades';
	protected $primaryKey = 'id_entidad';
	public $timestamps = false;

	protected $casts = [
		'id_sector' => 'int'
	];

	protected $fillable = [
		'nombre',
		'id_sector'
	];

	public function sectore()
	{
		return $this->belongsTo(Sectore::class, 'id_sector');
	}

	public function entidades_tipos()
	{
		return $this->hasMany(EntidadesTipo::class, 'id_entidad');
	}

	public function proyectos()
	{
		return $this->hasMany(Proyecto::class, 'id_entidad');
	}
}
