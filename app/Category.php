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
        return $this->belongsTo(File::class,'Img_id');
    }
    public function Icon(){
        return $this->belongsTo(File::class,'ImgIcon_id');
    }
    public static function Categories(){
       
        return Category::where('id','not in',Subcategory::GetIds())->get();
    }
    public static function Subcategories(){
       
        return Category::where('id','in',Subcategory::GetIds())->get();
    }
}
