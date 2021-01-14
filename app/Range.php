<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Range extends Model
{
    public function Event(){
        return $this->belongsTo(Event::class);
    }
    public function Location(){
        return $this->belongsTo(Location::class);
    }
}
