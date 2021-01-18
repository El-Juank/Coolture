<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LikeRumourMessage extends Model
{
    protected $table="LikesRumourMessage";
    
    public function User(){
        return $this->belongsTo(User::class);
    }
    public function RumourMessage(){
        return $this->belongsTo(RumourMessage::class);
    }
}
