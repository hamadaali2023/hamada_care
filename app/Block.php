<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    public function doctors()
    {
        return $this->belongsTo(Doctor::class, 'doctorId', 'id');
    }
}
