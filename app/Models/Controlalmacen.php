<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Controlalmacen
 * 
 * @property int $ubicaciones_UbicacionID
 * @property string $productos_CodigoInterno
 * 
 * @property Producto $producto
 * @property Ubicacione $ubicacione
 *
 * @package App\Models
 */
class Controlalmacen extends Model
{
	protected $table = 'controlalmacen';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ubicaciones_UbicacionID' => 'int'
	];

	public function producto()
	{
		return $this->belongsTo(Producto::class, 'productos_CodigoInterno');
	}

	public function ubicacione()
	{
		return $this->belongsTo(Ubicacione::class, 'ubicaciones_UbicacionID');
	}
}
