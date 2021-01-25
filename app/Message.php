<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public function From(){
       
      return $this->belongsTo(User::class, 'FromUser_id');
    }
    public function To(){
        
       return $this->belongsTo(User::class, 'ToUser_id');
    }

    public static function Purgue(){
        self::where('CanDelete',true)->orWhere(function($query){
                $query->where('ToUser_id',User::COMUNITY_ID)
                      ->where('FromUser_id',User::COMUNITY_ID);
        })->delete();//mirar que funcioni
      
    }
}
