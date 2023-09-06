<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ModelHasPermission
 * 
 * @property string $model_type
 * @property int $model_id
 * @property int $permissions_id
 * 
 * @property Permission $permission
 *
 * @package App\Models
 */
class ModelHasPermission extends Model
{
	protected $table = 'model_has_permissions';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'model_id' => 'int',
		'permissions_id' => 'int'
	];

	public function permission()
	{
		return $this->belongsTo(Permission::class, 'permissions_id');
	}
}
