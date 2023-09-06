<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductosHasProveedore
 * 
 * @property string $productos_CodigoInterno
 * @property int|null $productos_users_id
 * @property int $productos_unidadentrada_UnidadID
 * @property int $productos_unidadsalida_UnidadID1
 * @property int $productos_marcas_MarcaID
 * @property int $productos_lineas_LineaID
 * @property int $proveedores_ProveedorID
 * 
 * @property Producto $producto
 * @property Proveedore $proveedore
 *
 * @package App\Models
 */
class ProductosHasProveedore extends Model
{
	protected $table = 'productos_has_proveedores';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'productos_users_id' => 'int',
		'productos_unidadentrada_UnidadID' => 'int',
		'productos_unidadsalida_UnidadID1' => 'int',
		'productos_marcas_MarcaID' => 'int',
		'productos_lineas_LineaID' => 'int',
		'proveedores_ProveedorID' => 'int'
	];

	protected $fillable = [
		'productos_users_id'
	];

	public function producto()
	{
		return $this->belongsTo(Producto::class, 'productos_CodigoInterno')
					->where('productos.CodigoInterno', '=', 'productos_has_proveedores.productos_CodigoInterno')
					->where('productos.users_id', '=', 'productos_has_proveedores.productos_users_id')
					->where('productos.unidadentrada_UnidadID', '=', 'productos_has_proveedores.productos_unidadentrada_UnidadID')
					->where('productos.unidadsalida_UnidadID1', '=', 'productos_has_proveedores.productos_unidadsalida_UnidadID1')
					->where('productos.marcas_MarcaID', '=', 'productos_has_proveedores.productos_marcas_MarcaID')
					->where('productos.lineas_LineaID', '=', 'productos_has_proveedores.productos_lineas_LineaID');
	}

	public function proveedore()
	{
		return $this->belongsTo(Proveedore::class, 'proveedores_ProveedorID');
	}
}
