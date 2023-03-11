<?php

namespace App;

use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Tymon\JWTAuth\Contracts\JWTSubject;

class Patient extends Authenticatable  implements JWTSubject
{
    use Notifiable;
    protected $table = 'patients';
	protected $fillable = [
         'email','password','created_at', 'updated_at','is_activated'
    ];
    public function scopeSelection($query)
    {
        return $query->select(
            'id',
            'first_name_' . app()->getLocale() . ' as first_name',
            'last_name_' . app()->getLocale() . ' as last_name',
            'email',
            'mobile',
            'photo',
            'gender',
            // 'address_' . app()->getLocale() . ' as address',
            'dateOfBirth',
            'status',
            'paid',
            'token',
            'device_token',
            'created_at',
            'updated_at'
        );
    }


    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function messages()
    {
      return $this->hasMany(Message::class,'sender_id','id');
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
