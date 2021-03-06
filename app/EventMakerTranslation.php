<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventMakerTranslation extends Model
{
    use SoftDeletes;
    protected $table="EventMaker_Translations";
    public function EventMaker(){
        return $this->belongsTo(EventMaker::class);
    }
}
