<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor_service extends Model
{
    public function doctors()
    {
        return $this->belongsTo(Doctor::class, 'doctorId', 'id');
    }
}
