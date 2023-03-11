<?php
namespace App;


use Illuminate\Database\Eloquent\Model;


class Message extends Model
{
    protected $guarded = [];
    
    protected $fillable =['message','file','chatID','senderType','date','time'];
    public function chat()
    {
        return $this->belongsTo(Chat::class);
    }
    public function Patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function Doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
    // protected $table = 'messagess';
    // protected $fillable =['message'];
    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }
}





