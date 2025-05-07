<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Contratista
 * 
 * @property int $id_contratista
 * @property int $id_usuario
 * @property string $nit
 * @property string $razon_social
 * 
 * @property Usuario $usuario
 * @property Collection|Contrato[] $contratos
 *
 * @package App\Models
 */
class Contratista extends Model
{
	protected $table = 'contratistas';
	protected $primaryKey = 'id_contratista';
	public $timestamps = false;

	protected $casts = [
		'id_usuario' => 'int'
	];

	protected $fillable = [
		'id_usuario',
		'nit',
		'razon_social'
	];

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'id_usuario');
	}

	public function contratos()
	{
		return $this->hasMany(Contrato::class, 'id_contratista');
	}
}
