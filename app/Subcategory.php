<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    public function Category(){
        return $this->belongsTo(Category::class);
    }
    public function EventMaker(){
        return $this->belongsTo(EventMaker::class);
    }
    public static function GetIds(){
        $subCategories=Subcategory::get();
        $ids=[];
        foreach($subCategories as $subCategory){
            array_push($ids,$subCategory->Category_id);
        }
        return $ids;
    }
}
