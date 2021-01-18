<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LikeEvent extends Model
{
    protected $table="LikesEvent";
    
    public function User(){
        return $this->belongsTo(User::class);
    }
    public function Event(){
        return $this->belongsTo(Event::class);
    }
}
