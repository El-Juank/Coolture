<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RumourMessageTranslation extends Model
{
    protected $table="RumourMessage_Translations";
    public function RumourMessage(){
        return $this->belongsTo(RumourMessage::class);
    }
}
