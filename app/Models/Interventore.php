<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Interventore
 * 
 * @property int $id_interventor
 * @property int $id_usuario
 * @property int $id_especialidad
 * @property string|null $registro_profesional
 * 
 * @property Usuario $usuario
 * @property Especialidade $especialidade
 * @property Collection|SeguimientoProyecto[] $seguimiento_proyectos
 *
 * @package App\Models
 */
class Interventore extends Model
{
	protected $table = 'interventores';
	protected $primaryKey = 'id_interventor';
	public $timestamps = false;

	protected $casts = [
		'id_usuario' => 'int',
		'id_especialidad' => 'int'
	];

	protected $fillable = [
		'id_usuario',
		'id_especialidad',
		'registro_profesional'
	];

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'id_usuario');
	}

	public function especialidade()
	{
		return $this->belongsTo(Especialidade::class, 'id_especialidad');
	}

	public function seguimiento_proyectos()
	{
		return $this->hasMany(SeguimientoProyecto::class, 'id_interventor');
	}
}
