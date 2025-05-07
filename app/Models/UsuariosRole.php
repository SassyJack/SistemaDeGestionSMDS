<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UsuariosRole
 * 
 * @property int $id_usuario_rol
 * @property int $id_usuario
 * @property int $id_rol
 * @property Carbon $fecha_asignacion
 * 
 * @property Usuario $usuario
 * @property Role $role
 *
 * @package App\Models
 */
class UsuariosRole extends Model
{
	protected $table = 'usuarios_roles';
	protected $primaryKey = 'id_usuario_rol';
	public $timestamps = false;

	protected $casts = [
		'id_usuario' => 'int',
		'id_rol' => 'int',
		'fecha_asignacion' => 'datetime'
	];

	protected $fillable = [
		'id_usuario',
		'id_rol',
		'fecha_asignacion'
	];

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'id_usuario');
	}

	public function role()
	{
		return $this->belongsTo(Role::class, 'id_rol');
	}
}
