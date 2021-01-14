<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use Translatable;
    use SoftDeletes;

    public $translatedAttributes=['Title','Description'];//change

    public function Users(){
        return $this->hasMany(User::class);
    }
    public function Location(){
        return $this->belongsTo(Location::class);
   
    }
    public function Likes(){
        return $this->hasMany(LikeEvent::class);
    }
    public function Messages(){
        return $this->hasMany(MessageEvent::class);
    }
    public function Tags(){
        return $this->morphMany(TagEvent::class,'EventTags');
    }

}
