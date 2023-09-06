<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Fabricante
 * 
 * @property int $FabricanteID
 * @property string|null $NombreFabricante
 * 
 * @property Collection|Marca[] $marcas
 *
 * @package App\Models
 */
class Fabricante extends Model
{
	protected $table = 'fabricantes';
	protected $primaryKey = 'FabricanteID';
	public $timestamps = false;

	protected $fillable = [
		'NombreFabricante'
	];

	public function marcas()
	{
		return $this->hasMany(Marca::class, 'fabricantes_FabricanteID');
	}
}
