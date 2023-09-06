<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Ubicacione
 * 
 * @property int $UbicacionID
 * @property string|null $NombreUbicacion
 * 
 * @property Collection|Controlalmacen[] $controlalmacens
 *
 * @package App\Models
 */
class Ubicacione extends Model
{
	protected $table = 'ubicaciones';
	protected $primaryKey = 'UbicacionID';
	public $timestamps = false;

	protected $fillable = [
		'NombreUbicacion'
	];

	public function controlalmacens()
	{
		return $this->hasMany(Controlalmacen::class, 'ubicaciones_UbicacionID');
	}
}
