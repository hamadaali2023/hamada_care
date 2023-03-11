<?php
namespace App;


use Illuminate\Database\Eloquent\Model;


class Chat extends Model
{
    protected $guarded = [];

    // protected $fillable =['message'];
     public function messages(){
        return $this->hasMany(Message::class);
    }
}

