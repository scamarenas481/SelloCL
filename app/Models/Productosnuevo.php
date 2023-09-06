<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Productosnuevo
 * 
 * @property int $ProductoNuevoID
 * @property string|null $Descripcion
 * @property Carbon|null $Fecha
 * @property int|null $Revisado
 * @property float|null $Cantidad
 * @property bool|null $no-se-maneja
 * @property bool|null $se-termino
 * @property bool|null $pedido-especial
 * @property int $users_id
 * @property int $unidades_UnidadID
 * 
 * @property Unidade $unidade
 * @property User $user
 *
 * @package App\Models
 */
class Productosnuevo extends Model
{
	protected $table = 'productosnuevos';
	public $timestamps = false;

	protected $casts = [
		'Fecha' => 'datetime',
		'Revisado' => 'int',
		'Cantidad' => 'float',
		'no-se-maneja' => 'bool',
		'se-termino' => 'bool',
		'pedido-especial' => 'bool',
		'users_id' => 'int',
		'unidades_UnidadID' => 'int'
	];

	protected $fillable = [
		'Descripcion',
		'Fecha',
		'Revisado',
		'Cantidad',
		'no-se-maneja',
		'se-termino',
		'pedido-especial'
	];

	public function unidade()
	{
		return $this->belongsTo(Unidade::class, 'unidades_UnidadID');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'users_id');
	}
}
