<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Detallesconteo
 * 
 * @property int $DetalleConteoID
 * @property float|null $ExistenciasContadas
 * @property string $productos_CodigoInterno
 * @property int $productos_users_id
 * @property int $productos_unidadentrada_UnidadID
 * @property int $productos_unidadsalida_UnidadID1
 * @property int $productos_marcas_MarcaID
 * @property int $productos_lineas_LineaID
 * @property int $conteos_ConteoID
 * 
 * @property Conteo $conteo
 * @property Producto $producto
 *
 * @package App\Models
 */
class Detallesconteo extends Model
{
	protected $table = 'detallesconteo';
	public $timestamps = false;

	protected $casts = [
		'ExistenciasContadas' => 'float',
		'productos_users_id' => 'int',
		'productos_unidadentrada_UnidadID' => 'int',
		'productos_unidadsalida_UnidadID1' => 'int',
		'productos_marcas_MarcaID' => 'int',
		'productos_lineas_LineaID' => 'int',
		'conteos_ConteoID' => 'int'
	];

	protected $fillable = [
		'ExistenciasContadas'
	];

	public function conteo()
	{
		return $this->belongsTo(Conteo::class, 'conteos_ConteoID');
	}

	public function producto()
	{
		return $this->belongsTo(Producto::class, 'productos_CodigoInterno')
					->where('productos.CodigoInterno', '=', 'detallesconteo.productos_CodigoInterno')
					->where('productos.users_id', '=', 'detallesconteo.productos_users_id')
					->where('productos.unidadentrada_UnidadID', '=', 'detallesconteo.productos_unidadentrada_UnidadID')
					->where('productos.unidadsalida_UnidadID1', '=', 'detallesconteo.productos_unidadsalida_UnidadID1')
					->where('productos.marcas_MarcaID', '=', 'detallesconteo.productos_marcas_MarcaID')
					->where('productos.lineas_LineaID', '=', 'detallesconteo.productos_lineas_LineaID');
	}
}
