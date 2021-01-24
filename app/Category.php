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
    
    public function GetName(){
        return Translate::Get($this,'Name');
    }

    public function Icon()
    {
        if($this->ImgIcon_id==null){
            $img=File::ImgDefaultNotFound();
        }else{
            $img=$this->belongsTo(File::class,'ImgIcon_id');
        }
        return $img; 
    }
    public function Image()
    {
        if($this->Img_id==null){
            $img=File::ImgDefaultNotFound();
        }else{
            $img=$this->belongsTo(File::class,'Img_id');
        }
        return $img; 
        
    }
    public static function Categories(){
       
        return Category::where('id','not in',Subcategory::GetIds())->get();
    }
    public static function Subcategories(){
       
        return Category::where('id','in',Subcategory::GetIds())->get();
    }
}
