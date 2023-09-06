<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Ordenescompra
 * 
 * @property int $OrdenCompraID
 * @property Carbon|null $Fecha
 * @property int $users_id
 * 
 * @property User $user
 * @property Collection|Detallesordencompra[] $detallesordencompras
 * @property Collection|Incumplimientoproveedore[] $incumplimientoproveedores
 *
 * @package App\Models
 */
class Ordenescompra extends Model
{
	protected $table = 'ordenescompra';
	public $timestamps = false;

	protected $casts = [
		'Fecha' => 'datetime',
		'users_id' => 'int'
	];

	protected $fillable = [
		'Fecha'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'users_id');
	}

	public function detallesordencompras()
	{
		return $this->hasMany(Detallesordencompra::class, 'ordenescompra_OrdenCompraID');
	}

	public function incumplimientoproveedores()
	{
		return $this->hasMany(Incumplimientoproveedore::class, 'ordenescompra_OrdenCompraID');
	}
}
