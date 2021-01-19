<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RumourMessageTranslation extends Model
{
    public function RumourMessage(){
        return $this->belongsTo(RumourMessage::class);
    }
}
