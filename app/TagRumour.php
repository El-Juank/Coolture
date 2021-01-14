<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TagRumour extends Model
{
    public function Tag(){
        return $this->belongsTo(Tag::class);
    }
    public function Rumour(){
        return $this->belongsTo(Rumour::class);
    }
}
