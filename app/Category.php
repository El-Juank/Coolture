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

    public function Image(){
        return $this->belongsTo(File::class);
    }
    public function UrlImage(){
        $file=$this->Image;
        return $file->Url;
    }
}
