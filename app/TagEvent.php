<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TagEvent extends Model
{
    public function Tag(){
        return $this->belongsTo(Tag::class);
    }
    public function Event(){
        return $this->belongsTo(Event::class);
    }
}
