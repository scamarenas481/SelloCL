<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Productossolicitado
 * 
 * @property int $ProductoSolicitadoID
 * @property float|null $CantidadSolicitada
 * @property int|null $SeTermino
 * @property int|null $NoSeManeja
 * @property Carbon|null $Fecha
 * @property int|null $Revisado
 * @property string|null $CodigoProveedor
 * 
 * @property Collection|Detallesordencompra[] $detallesordencompras
 *
 * @package App\Models
 */
class Productossolicitado extends Model
{
	protected $table = 'productossolicitados';
	protected $primaryKey = 'ProductoSolicitadoID';
	public $timestamps = false;

	protected $casts = [
		'CantidadSolicitada' => 'float',
		'SeTermino' => 'int',
		'NoSeManeja' => 'int',
		'Fecha' => 'datetime',
		'Revisado' => 'int'
	];

	protected $fillable = [
		'CantidadSolicitada',
		'SeTermino',
		'NoSeManeja',
		'Fecha',
		'Revisado',
		'CodigoProveedor'
	];

	public function detallesordencompras()
	{
		return $this->hasMany(Detallesordencompra::class, 'productossolicitados_ProductoSolicitadoID');
	}
}
