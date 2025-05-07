<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class EntidadesTipo
 * 
 * @property int $id_entidad_tipo
 * @property int $id_entidad
 * @property int $id_tipo_entidad
 * 
 * @property Entidade $entidade
 * @property TipoEntidade $tipo_entidade
 *
 * @package App\Models
 */
class EntidadesTipo extends Model
{
	protected $table = 'entidades_tipos';
	protected $primaryKey = 'id_entidad_tipo';
	public $timestamps = false;

	protected $casts = [
		'id_entidad' => 'int',
		'id_tipo_entidad' => 'int'
	];

	protected $fillable = [
		'id_entidad',
		'id_tipo_entidad'
	];

	public function entidade()
	{
		return $this->belongsTo(Entidade::class, 'id_entidad');
	}

	public function tipo_entidade()
	{
		return $this->belongsTo(TipoEntidade::class, 'id_tipo_entidad');
	}
}
