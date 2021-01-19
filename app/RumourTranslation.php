<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RumourTranslation extends Model
{
    use SoftDeletes;
    public function Rumour(){
        return $this->belongsTo(Rumour::class);
    }
}
