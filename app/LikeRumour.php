<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LikeRumour extends Model
{
    public function User(){
        return $this->belongsTo(User::class);
    }
    public function Rumour(){
        return $this->belongsTo(Rumour::class);
    }
}
