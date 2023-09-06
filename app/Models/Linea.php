<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Linea
 * 
 * @property int $LineaID
 * @property string|null $NombreLinea
 * 
 * @property Collection|Producto[] $productos
 *
 * @package App\Models
 */
class Linea extends Model
{
	protected $table = 'lineas';
	protected $primaryKey = 'LineaID';
	public $timestamps = false;

	protected $fillable = [
		'NombreLinea'
	];

	public function productos()
	{
		return $this->hasMany(Producto::class, 'lineas_LineaID');
	}
}
