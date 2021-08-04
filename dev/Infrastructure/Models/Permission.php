<?php

namespace Dev\Infrastructure\Models;

use Illuminate\Database\Eloquent\Model;

/**
 *
 */
class Permission extends Model
{
	/**
	 *
	 */
	protected $table = 'permissions';

 	/**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

     /**
     * The admins that belong to the role.
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'permission_user', 'permission_id', 'user_id');
    }

    
    public function roles() {

        return $this->belongsToMany(Role::class, 'permission_role', 'permission_id', 'role_id');
            
    }
}












