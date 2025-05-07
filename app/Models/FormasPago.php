<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class FormasPago
 * 
 * @property int $id_forma_pago
 * @property string $nombre
 * @property string|null $descripcion
 * 
 * @property Collection|Contrato[] $contratos
 *
 * @package App\Models
 */
class FormasPago extends Model
{
	protected $table = 'formas_pago';
	protected $primaryKey = 'id_forma_pago';
	public $timestamps = false;

	protected $fillable = [
		'nombre',
		'descripcion'
	];

	public function contratos()
	{
		return $this->hasMany(Contrato::class, 'id_forma_pago');
	}
}
