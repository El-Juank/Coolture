<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Location extends Model
{
    use Translatable;
    use SoftDeletes;

    public $translatedAttributes=['Name'];
    public function GetName(){
        return Translate::Get($this,'Name');
    }
}
