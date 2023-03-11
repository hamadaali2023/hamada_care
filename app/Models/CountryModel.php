<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CountryModel extends Model
{

    protected $table = 'specialities';

    protected $fillable = [
        'name_ar', 'name_en','active','created_at', 'updated_at'
    ];


    
}
