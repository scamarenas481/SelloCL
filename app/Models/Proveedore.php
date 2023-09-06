<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Proveedore
 * 
 * @property int $ProveedorID
 * @property string|null $NombreProveedor
 * 
 * @property Collection|Incumplimientoproveedore[] $incumplimientoproveedores
 * @property Collection|Producto[] $productos
 *
 * @package App\Models
 */
class Proveedore extends Model
{
	protected $table = 'proveedores';
	protected $primaryKey = 'ProveedorID';
	public $timestamps = false;

	protected $fillable = [
		'NombreProveedor'
	];

	public function incumplimientoproveedores()
	{
		return $this->hasMany(Incumplimientoproveedore::class, 'proveedores_ProveedorID');
	}

	public function productos()
	{
		return $this->belongsToMany(Producto::class, 'productos_has_proveedores', 'proveedores_ProveedorID', 'productos_CodigoInterno')
					->withPivot('productos_users_id', 'productos_unidadentrada_UnidadID', 'productos_unidadsalida_UnidadID1', 'productos_marcas_MarcaID', 'productos_lineas_LineaID');
	}
}
