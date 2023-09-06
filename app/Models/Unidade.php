<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Unidade
 * 
 * @property int $UnidadID
 * @property string|null $Nombre Unidad
 * 
 * @property Collection|Producto[] $productos
 * @property Collection|Productosnuevo[] $productosnuevos
 *
 * @package App\Models
 */
class Unidade extends Model
{
	protected $table = 'unidades';
	protected $primaryKey = 'UnidadID';
	public $timestamps = false;

	protected $fillable = [
		'Nombre Unidad'
	];

	public function productos()
	{
		return $this->hasMany(Producto::class, 'unidadsalida_UnidadID1');
	}

	public function productosnuevos()
	{
		return $this->hasMany(Productosnuevo::class, 'unidades_UnidadID');
	}
}
