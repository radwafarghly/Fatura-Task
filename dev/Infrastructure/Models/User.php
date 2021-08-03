<?php

namespace Dev\Infrastructure\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Carbon\Carbon;
use Dev\Domain\Service\NationalitiyService;
use Dev\Domain\Service\ReservationService;

/**
 * Class User responsible for users table
 * @package Dev\Infrastructure\Models
 */
class User extends Authenticatable implements JWTSubject
{   
 	/**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];



    

    /**
     *
     */
	public function setPasswordAttribute($password)
    {   
        $this->attributes['password'] = Hash::make($password);
    }

  
    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }


   
  


    
}