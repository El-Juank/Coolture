<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    public function Path(){
        return $this->belongsTo(Path::class);
    }
    public function Url(){
        $path=$this->Path();
        return $path->Url.'\\'.$this->Name.'.'.$this->Format;
    }
}
