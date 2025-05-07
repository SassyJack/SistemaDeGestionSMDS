<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Especialidade
 * 
 * @property int $id_especialidad
 * @property string $nombre
 * @property string|null $descripcion
 * 
 * @property Collection|Interventore[] $interventores
 *
 * @package App\Models
 */
class Especialidade extends Model
{
	protected $table = 'especialidades';
	protected $primaryKey = 'id_especialidad';
	public $timestamps = false;

	protected $fillable = [
		'nombre',
		'descripcion'
	];

	public function interventores()
	{
		return $this->hasMany(Interventore::class, 'id_especialidad');
	}
}
