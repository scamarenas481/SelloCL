<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Marca
 * 
 * @property int $MarcaID
 * @property string|null $NombreMarca
 * @property int $fabricantes_FabricanteID
 * 
 * @property Fabricante $fabricante
 * @property Collection|Producto[] $productos
 *
 * @package App\Models
 */
class Marca extends Model
{
	protected $table = 'marcas';
	public $timestamps = false;

	protected $casts = [
		'fabricantes_FabricanteID' => 'int'
	];

	protected $fillable = [
		'NombreMarca'
	];

	public function fabricante()
	{
		return $this->belongsTo(Fabricante::class, 'fabricantes_FabricanteID');
	}

	public function productos()
	{
		return $this->hasMany(Producto::class, 'marcas_MarcaID');
	}
}
