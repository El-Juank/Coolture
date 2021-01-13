<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    //
    use Translatable;
    use SoftDeletes;

    public $translatedAttributes=['Name'];
}
