<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Conteo
 * 
 * @property int $ConteoID
 * @property Carbon|null $FechaConteo
 * @property int|null $ProductosContadosNum
 * @property int $users_id
 * 
 * @property User $user
 * @property Collection|Detallesconteo[] $detallesconteos
 *
 * @package App\Models
 */
class Conteo extends Model
{
	protected $table = 'conteos';
	public $timestamps = false;

	protected $casts = [
		'FechaConteo' => 'datetime',
		'ProductosContadosNum' => 'int',
		'users_id' => 'int'
	];

	protected $fillable = [
		'FechaConteo',
		'ProductosContadosNum'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'users_id');
	}

	public function detallesconteos()
	{
		return $this->hasMany(Detallesconteo::class, 'conteos_ConteoID');
	}
}
