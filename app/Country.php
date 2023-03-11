<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
     public function scopeSelection($query)
    {
        return $query->select(
            'id',
            'name_' . app()->getLocale() . ' as name',
            'created_at',
            'updated_at'       
        );
    }
}