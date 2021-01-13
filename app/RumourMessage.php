<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

class RumourMessage extends Model
{
    use Translatable;

    public $translatedAttributes=['Message'];
}
