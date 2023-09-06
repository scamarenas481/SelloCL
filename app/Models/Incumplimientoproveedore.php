<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Incumplimientoproveedore
 * 
 * @property int $idIncumplimientoProveedores
 * @property string|null $FirmaProveedor
 * @property int|null $FolioOrdenCompra
 * @property Carbon|null $FechaPromesaEntrega
 * @property Carbon|null $FechaEntrega
 * @property int|null $DiasAtraso
 * @property int|null $PedidoIncompleto
 * @property int|null $IncumplimientoProveedorescol
 * @property int|null $MaterialEnMalEstado
 * @property int|null $NoLlegoATiempo
 * @property int|null $MaterialIncorrecto
 * @property int|null $CantidadesIncorrectas
 * @property string|null $Observaciones
 * @property int $proveedores_ProveedorID
 * @property int $ordenescompra_OrdenCompraID
 * 
 * @property Ordenescompra $ordenescompra
 * @property Proveedore $proveedore
 *
 * @package App\Models
 */
class Incumplimientoproveedore extends Model
{
	protected $table = 'incumplimientoproveedores';
	public $timestamps = false;

	protected $casts = [
		'FolioOrdenCompra' => 'int',
		'FechaPromesaEntrega' => 'datetime',
		'FechaEntrega' => 'datetime',
		'DiasAtraso' => 'int',
		'PedidoIncompleto' => 'int',
		'IncumplimientoProveedorescol' => 'int',
		'MaterialEnMalEstado' => 'int',
		'NoLlegoATiempo' => 'int',
		'MaterialIncorrecto' => 'int',
		'CantidadesIncorrectas' => 'int',
		'proveedores_ProveedorID' => 'int',
		'ordenescompra_OrdenCompraID' => 'int'
	];

	protected $fillable = [
		'FirmaProveedor',
		'FolioOrdenCompra',
		'FechaPromesaEntrega',
		'FechaEntrega',
		'DiasAtraso',
		'PedidoIncompleto',
		'IncumplimientoProveedorescol',
		'MaterialEnMalEstado',
		'NoLlegoATiempo',
		'MaterialIncorrecto',
		'CantidadesIncorrectas',
		'Observaciones'
	];

	public function ordenescompra()
	{
		return $this->belongsTo(Ordenescompra::class, 'ordenescompra_OrdenCompraID');
	}

	public function proveedore()
	{
		return $this->belongsTo(Proveedore::class, 'proveedores_ProveedorID');
	}
}
