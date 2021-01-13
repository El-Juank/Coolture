<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rumour extends Model
{
    use Translatable;
    use SoftDeletes;

    public $translatedAttributes=['Title','Description'];
}