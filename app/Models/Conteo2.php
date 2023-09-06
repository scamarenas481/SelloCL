<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Conteo2
 * 
 * @property int $Conteo2ID
 * @property float|null $ExistenciasContadas
 * @property Carbon|null $FechaConteo
 * @property string $productos_CodigoInterno
 * @property int $productos_users_id
 * @property int $productos_unidadentrada_UnidadID
 * @property int $productos_unidadsalida_UnidadID1
 * @property int $productos_marcas_MarcaID
 * @property int $productos_lineas_LineaID
 * 
 * @property Producto $producto
 *
 * @package App\Models
 */
class Conteo2 extends Model
{
	protected $table = 'conteo2';
	public $timestamps = false;

	protected $casts = [
		'ExistenciasContadas' => 'float',
		'FechaConteo' => 'datetime',
		'productos_users_id' => 'int',
		'productos_unidadentrada_UnidadID' => 'int',
		'productos_unidadsalida_UnidadID1' => 'int',
		'productos_marcas_MarcaID' => 'int',
		'productos_lineas_LineaID' => 'int'
	];

	protected $fillable = [
		'ExistenciasContadas',
		'FechaConteo'
	];

	public function producto()
	{
		return $this->belongsTo(Producto::class, 'productos_CodigoInterno')
					->where('productos.CodigoInterno', '=', 'conteo2.productos_CodigoInterno')
					->where('productos.users_id', '=', 'conteo2.productos_users_id')
					->where('productos.unidadentrada_UnidadID', '=', 'conteo2.productos_unidadentrada_UnidadID')
					->where('productos.unidadsalida_UnidadID1', '=', 'conteo2.productos_unidadsalida_UnidadID1')
					->where('productos.marcas_MarcaID', '=', 'conteo2.productos_marcas_MarcaID')
					->where('productos.lineas_LineaID', '=', 'conteo2.productos_lineas_LineaID');
	}
}
