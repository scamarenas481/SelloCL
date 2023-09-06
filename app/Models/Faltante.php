<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Faltante
 * 
 * @property int $FaltantesID
 * @property string|null $CodigoProveedor
 * @property string|null $Descripcion
 * @property float|null $CantidadSolicitada
 * @property int|null $SeTermino
 * @property int|null $NoSeManeja
 * @property int|null $ConExistencia
 * @property float|null $Existencias
 * @property Carbon|null $Fecha
 * @property int|null $Revisado
 * @property string $productos_CodigoInterno
 * @property int $productos_users_id
 * @property int $productos_unidadentrada_UnidadID
 * @property int $productos_unidadsalida_UnidadID1
 * @property int $productos_marcas_MarcaID
 * @property int $productos_lineas_LineaID
 * @property int $observacionesfaltantes_ObservacionID
 * 
 * @property Observacionesfaltante $observacionesfaltante
 * @property Producto $producto
 *
 * @package App\Models
 */
class Faltante extends Model
{
	protected $table = 'faltantes';
	public $timestamps = false;

	protected $casts = [
		'CantidadSolicitada' => 'float',
		'SeTermino' => 'int',
		'NoSeManeja' => 'int',
		'ConExistencia' => 'int',
		'Existencias' => 'float',
		'Fecha' => 'datetime',
		'Revisado' => 'int',
		'productos_users_id' => 'int',
		'productos_unidadentrada_UnidadID' => 'int',
		'productos_unidadsalida_UnidadID1' => 'int',
		'productos_marcas_MarcaID' => 'int',
		'productos_lineas_LineaID' => 'int',
		'observacionesfaltantes_ObservacionID' => 'int'
	];

	protected $fillable = [
		'CodigoProveedor',
		'Descripcion',
		'CantidadSolicitada',
		'SeTermino',
		'NoSeManeja',
		'ConExistencia',
		'Existencias',
		'Fecha',
		'Revisado'
	];

	public function observacionesfaltante()
	{
		return $this->belongsTo(Observacionesfaltante::class, 'observacionesfaltantes_ObservacionID');
	}

	public function producto()
	{
		return $this->belongsTo(Producto::class, 'productos_CodigoInterno')
					->where('productos.CodigoInterno', '=', 'faltantes.productos_CodigoInterno')
					->where('productos.users_id', '=', 'faltantes.productos_users_id')
					->where('productos.unidadentrada_UnidadID', '=', 'faltantes.productos_unidadentrada_UnidadID')
					->where('productos.unidadsalida_UnidadID1', '=', 'faltantes.productos_unidadsalida_UnidadID1')
					->where('productos.marcas_MarcaID', '=', 'faltantes.productos_marcas_MarcaID')
					->where('productos.lineas_LineaID', '=', 'faltantes.productos_lineas_LineaID');
	}
}
