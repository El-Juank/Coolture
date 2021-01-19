<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class EventMessageTranslation extends Model
{
    protected $table="EventMessage_Translations";
    public function EventMessage(){
        return $this->belongsTo(EventMessage::class);
    }
}
