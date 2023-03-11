<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Speciality extends Model
{
	 // protected $fillable=['name_ar','name_en']; 
	public function scopeSelection($query)
    {
        return $query->select(
        	'id',
        	'name_' . app()->getLocale() . ' as name',
        	'description_' . app()->getLocale() . ' as description',
        	'icon'
        );
    }
}
