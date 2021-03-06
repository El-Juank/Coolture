<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notification extends Model
{
    use Translatable;
    use SoftDeletes;

    public $translatedAttributes=['Message'];
    public function GetMessage(){
        return Translate::Get($this,'Message');
    }
 
}
