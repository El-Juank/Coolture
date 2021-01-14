<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public function From(){
        return $this->belongsTo(User::class);
    }
    public function To(){
        return $this->belongsTo(User::class);
    }
}
