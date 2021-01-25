<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Location extends Model
{
    use Translatable;
    use SoftDeletes;

    public const DEFAULT_COUNTRY=1;
    public const DEFAULT_LOCATION=2;

    public $translatedAttributes=['Name'];
    public function GetName(){
        return Translate::Get($this,'Name');
    }
}
