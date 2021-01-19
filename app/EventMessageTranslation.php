<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class EventMessageTranslation extends Model
{
    public function EventMessage(){
        return $this->belongsTo(EventMessage::class);
    }
}
