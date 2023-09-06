<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Detallesordencompra
 * 
 * @property int $DetalleOrdenCompraID
 * @property float|null $CantidadSolicitada
 * @property float|null $CantidadEntregada
 * @property int $ordenescompra_OrdenCompraID
 * @property int $productossolicitados_ProductoSolicitadoID
 * 
 * @property Ordenescompra $ordenescompra
 * @property Productossolicitado $productossolicitado
 * @property Collection|Incidenciasproveedor[] $incidenciasproveedors
 *
 * @package App\Models
 */
class Detallesordencompra extends Model
{
	protected $table = 'detallesordencompra';
	public $timestamps = false;

	protected $casts = [
		'CantidadSolicitada' => 'float',
		'CantidadEntregada' => 'float',
		'ordenescompra_OrdenCompraID' => 'int',
		'productossolicitados_ProductoSolicitadoID' => 'int'
	];

	protected $fillable = [
		'CantidadSolicitada',
		'CantidadEntregada'
	];

	public function ordenescompra()
	{
		return $this->belongsTo(Ordenescompra::class, 'ordenescompra_OrdenCompraID');
	}

	public function productossolicitado()
	{
		return $this->belongsTo(Productossolicitado::class, 'productossolicitados_ProductoSolicitadoID');
	}

	public function incidenciasproveedors()
	{
		return $this->hasMany(Incidenciasproveedor::class, 'detallesordencompra_DetalleOrdenCompraID');
	}
}
