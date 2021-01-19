<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventTranslation extends Model
{
    use SoftDeletes;
    public function Event(){
        return $this->belongsTo(Event::class);
    }
}
