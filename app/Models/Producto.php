<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Producto
 * 
 * @property string $CodigoInterno
 * @property string|null $Descripcion
 * @property float|null $FactorUnidades
 * @property string|null $CodigoProveedor
 * @property string|null $ClaveAlterna
 * @property string|null $NumeroFabricante
 * @property string|null $Status
 * @property float|null $Existencias
 * @property int|null $ClaveSAT
 * @property string|null $ClaveUnidad
 * @property Carbon|null $FechaRegistro
 * @property bool|null $Contado
 * @property int $users_id
 * @property int $unidadentrada_UnidadID
 * @property int $unidadsalida_UnidadID1
 * @property int $marcas_MarcaID
 * @property int $lineas_LineaID
 * 
 * @property Linea $linea
 * @property Marca $marca
 * @property Unidade $unidade
 * @property User $user
 * @property Collection|Conteo2[] $conteo2s
 * @property Collection|Controlalmacen[] $controlalmacens
 * @property Collection|Detallesconteo[] $detallesconteos
 * @property Collection|Faltante[] $faltantes
 * @property Collection|Proveedore[] $proveedores
 *
 * @package App\Models
 */
class Producto extends Model
{
	protected $table = 'productos';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'FactorUnidades' => 'float',
		'Existencias' => 'float',
		'ClaveSAT' => 'int',
		'FechaRegistro' => 'datetime',
		'Contado' => 'bool',
		'users_id' => 'int',
		'unidadentrada_UnidadID' => 'int',
		'unidadsalida_UnidadID1' => 'int',
		'marcas_MarcaID' => 'int',
		'lineas_LineaID' => 'int'
	];

	protected $fillable = [
		'Descripcion',
		'FactorUnidades',
		'CodigoProveedor',
		'ClaveAlterna',
		'NumeroFabricante',
		'Status',
		'Existencias',
		'ClaveSAT',
		'ClaveUnidad',
		'FechaRegistro',
		'Contado'
	];

	public function linea()
	{
		return $this->belongsTo(Linea::class, 'lineas_LineaID');
	}

	public function marca()
	{
		return $this->belongsTo(Marca::class, 'marcas_MarcaID');
	}

	public function unidade()
	{
		return $this->belongsTo(Unidade::class, 'unidadsalida_UnidadID1');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'users_id');
	}

	public function conteo2s()
	{
		return $this->hasMany(Conteo2::class, 'productos_CodigoInterno');
	}

	public function controlalmacens()
	{
		return $this->hasMany(Controlalmacen::class, 'productos_CodigoInterno');
	}

	public function detallesconteos()
	{
		return $this->hasMany(Detallesconteo::class, 'productos_CodigoInterno');
	}

	public function faltantes()
	{
		return $this->hasMany(Faltante::class, 'productos_CodigoInterno');
	}

	public function proveedores()
	{
		return $this->belongsToMany(Proveedore::class, 'productos_has_proveedores', 'productos_CodigoInterno', 'proveedores_ProveedorID')
					->withPivot('productos_users_id', 'productos_unidadentrada_UnidadID', 'productos_unidadsalida_UnidadID1', 'productos_marcas_MarcaID', 'productos_lineas_LineaID');
	}
}
