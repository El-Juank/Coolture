<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NotificationChangeEvent extends Model
{
    protected $table="NotificationChangesEvent";
    
    public function User(){
        return $this->belongsTo(User::class);
    }
    public function Event(){
        return $this->belongsTo(Event::class);
    }
    public function UnRead(){
        return $this->updated_at->lt($this->Event->updated_at);
    }
}
