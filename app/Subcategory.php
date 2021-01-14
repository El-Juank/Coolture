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
}
