<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NotificationChangeEventMaker extends Model
{
    protected $table="NotificationChangesEventMaker";

    public function User(){
        return $this->belongsTo(User::class);
    }
    public function EventMaker(){
        return $this->belongsTo(EventMaker::class);
    }
    public function UnRead(){
        return $this->updated_at<$this->EventMaker()->updated_at;
    }
}
