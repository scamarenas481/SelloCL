<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ModelHasRole
 * 
 * @property string $model_type
 * @property int $model_id
 * @property int $roles_id
 * 
 * @property Role $role
 *
 * @package App\Models
 */
class ModelHasRole extends Model
{
	protected $table = 'model_has_roles';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'model_id' => 'int',
		'roles_id' => 'int'
	];

	public function role()
	{
		return $this->belongsTo(Role::class, 'roles_id');
	}
}
