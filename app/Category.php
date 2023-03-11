<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //

    public function scopeSelection($query)
    {
        return $query->select(
        	'id',
        	'name_' . app()->getLocale() . ' as name',
        	'description_' . app()->getLocale() . ' as description',
        	'icon',
        	'type',
        	'top'
        );
    }
}
