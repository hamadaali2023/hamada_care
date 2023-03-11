<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    public function scopeSelection($query)
    {
        return $query->select(
        	'id',
        	'title_' . app()->getLocale() . ' as title',
        	'description_' . app()->getLocale() . ' as description',
        	'icon',
        	'type',
        	'top'
        	
        );
    }
}
