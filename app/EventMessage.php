<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Astrotomic\Translatable\Translatable;

class EventMessage extends Model
{
    use Translatable;

    public $translatedAttributes=['Message'];
    
    public function Users(){
        return $this->hasMany(User::class);
    }
}
