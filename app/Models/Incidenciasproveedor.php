<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Incidenciasproveedor
 * 
 * @property int $idIncumplimientoProveedores
 * @property int|null $FolioOrdenCompra
 * @property Carbon|null $FechaPromesaEntrega
 * @property Carbon|null $FechaEntrega
 * @property int|null $DiasAtraso
 * @property int|null $PedidoIncompleto
 * @property int|null $MaterialEnMalEstado
 * @property int|null $NoLlegoATiempo
 * @property int|null $MaterialIncorrecto
 * @property int|null $CantidadesIncorrectas
 * @property string|null $Observaciones
 * @property int|null $CantidadNoEntregada
 * @property int $detallesordencompra_DetalleOrdenCompraID
 * @property int $detallesordencompra_ordenescompra_OrdenCompraID
 * @property int $detallesordencompra_productossolicitados_ProductoSolicitadoID
 * 
 * @property Detallesordencompra $detallesordencompra
 *
 * @package App\Models
 */
class Incidenciasproveedor extends Model
{
	protected $table = 'incidenciasproveedor';
	public $timestamps = false;

	protected $casts = [
		'FolioOrdenCompra' => 'int',
		'FechaPromesaEntrega' => 'datetime',
		'FechaEntrega' => 'datetime',
		'DiasAtraso' => 'int',
		'PedidoIncompleto' => 'int',
		'MaterialEnMalEstado' => 'int',
		'NoLlegoATiempo' => 'int',
		'MaterialIncorrecto' => 'int',
		'CantidadesIncorrectas' => 'int',
		'CantidadNoEntregada' => 'int',
		'detallesordencompra_DetalleOrdenCompraID' => 'int',
		'detallesordencompra_ordenescompra_OrdenCompraID' => 'int',
		'detallesordencompra_productossolicitados_ProductoSolicitadoID' => 'int'
	];

	protected $fillable = [
		'FolioOrdenCompra',
		'FechaPromesaEntrega',
		'FechaEntrega',
		'DiasAtraso',
		'PedidoIncompleto',
		'MaterialEnMalEstado',
		'NoLlegoATiempo',
		'MaterialIncorrecto',
		'CantidadesIncorrectas',
		'Observaciones',
		'CantidadNoEntregada'
	];

	public function detallesordencompra()
	{
		return $this->belongsTo(Detallesordencompra::class, 'detallesordencompra_DetalleOrdenCompraID')
					->where('detallesordencompra.DetalleOrdenCompraID', '=', 'incidenciasproveedor.detallesordencompra_DetalleOrdenCompraID')
					->where('detallesordencompra.ordenescompra_OrdenCompraID', '=', 'incidenciasproveedor.detallesordencompra_ordenescompra_OrdenCompraID')
					->where('detallesordencompra.productossolicitados_ProductoSolicitadoID', '=', 'incidenciasproveedor.detallesordencompra_productossolicitados_ProductoSolicitadoID');
	}
}
