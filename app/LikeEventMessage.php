<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LikeEventMessage extends Model
{
    protected $table="LikesEventMessage";
    
    public function User(){
        return $this->belongsTo(User::class);
    }
    public function EventMessage(){
        return $this->belongsTo(EventMessage::class);
    }
}
