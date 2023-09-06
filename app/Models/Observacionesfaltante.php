<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Observacionesfaltante
 * 
 * @property int $ObservacionID
 * @property string|null $Observacion
 * 
 * @property Collection|Faltante[] $faltantes
 *
 * @package App\Models
 */
class Observacionesfaltante extends Model
{
	protected $table = 'observacionesfaltantes';
	protected $primaryKey = 'ObservacionID';
	public $timestamps = false;

	protected $fillable = [
		'Observacion'
	];

	public function faltantes()
	{
		return $this->hasMany(Faltante::class, 'observacionesfaltantes_ObservacionID');
	}
}
