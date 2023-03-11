<?php

namespace App;
// use Illuminate\Foundation\Auth\User as Authenticatable;



use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Tymon\JWTAuth\Contracts\JWTSubject;


use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
class Doctor extends Authenticatable  implements JWTSubject
{
          use Notifiable;


    protected $fillable = [
        'name_ar','name_en', 'email', 'password','is_activated'
    ];

    
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    // public function scopeSelection($query)
    // {
    //     return $query->select(
    //         'id',
    //         'countryId',
    //         'cityId',
    //         'first_name',
    //         'last_name',
    //         'email',
    //         'mobile',
    //         'address',
    //         'longitude',
    //         'latitude',
    //         'gender',
    //         'nationality',
    //         'photo',            
    //         'status',
    //         'token',
    //         'device_token',
    //         'created_at',
    //         'updated_at'
    //     );
    // }
    
  
    
    public function specialityName()
    {
        return $this->belongsTo(Speciality::class, 'specialityId', 'id');
    }
    
    public function services()
    {
      return $this->hasMany(Service::class,'doctorId','id');
    }
    public function messages()
    {
      return $this->hasMany(Message::class,'sender_id','id');
    }

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
