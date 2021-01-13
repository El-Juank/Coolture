<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Path extends Model
{
    public function Files(){
        return $this->hasMany(File::class);
    }
}