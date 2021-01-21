<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Path extends Model
{
    const DEFAULT_PATH_ID=1;
    public function Files(){
        return $this->hasMany(File::class);
    }

}
