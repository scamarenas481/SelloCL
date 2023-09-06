<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RoleHasPermission
 * 
 * @property int $roles_id
 * @property int $permissions_id
 * 
 * @property Permission $permission
 * @property Role $role
 *
 * @package App\Models
 */
class RoleHasPermission extends Model
{
	protected $table = 'role_has_permissions';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'roles_id' => 'int',
		'permissions_id' => 'int'
	];

	public function permission()
	{
		return $this->belongsTo(Permission::class, 'permissions_id');
	}

	public function role()
	{
		return $this->belongsTo(Role::class, 'roles_id');
	}
}
