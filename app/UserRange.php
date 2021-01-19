<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRange extends Model
{
    protected $table="UserRanges";
    
    public function EventMaker(){
        return $this->belongsTo(EventMaker::class);
    }
    public function User(){
        return $this->belongsTo(User::class);
    }
}
