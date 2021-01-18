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
        return $this->belongsTo(File::class,'Image_id');
    }
    public function UrlImage(){
        $file=$this->Image();
        return $file->Url;
    }
    public static function Categories(){
       
        return Category::where('id','not in',Subcategory::GetIds())->get();
    }
    public static function Subcategories(){
       
        return Category::where('id','in',Subcategory::GetIds())->get();
    }
}
