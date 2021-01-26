<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NotificationChangeRumour extends Model
{
    protected $table="NotificationChangesRumour";
    public function User(){
        return $this->belongsTo(User::class);
    }
    public function Rumour(){
        return $this->belongsTo(Rumour::class);
    }
    public function UnRead(){
        return $this->updated_at->lt($this->Rumour->updated_at);
    }
}
