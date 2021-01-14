<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Preference extends Model
{
    public function User(){
        return $this->belongsTo(User::class);
    }
    public function Config(){
        return json_decode($this->UserConfig,true);
    }
}
