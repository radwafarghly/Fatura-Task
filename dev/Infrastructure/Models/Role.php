<?php

namespace Dev\Infrastructure\Models;

use Illuminate\Database\Eloquent\Model;

/**
 *
 */
class Role extends Model
{
	/**
	 *
	 */
	protected $table = 'roles';

 	/**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];
    /**
     * The permissions that belong to the role.
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'permission_role', 'role_id', 'permission_id');
    }
}