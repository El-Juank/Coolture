<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public function From(){
       
        if($this->From_id==null)
        {
            $user=User::CommunityUser();
        }else{
            $user= $this->belongsTo(User::class, 'FromUser_id');
        }
        return $user;
    }
    public function To(){
        
        if($this->To_id==null)
        {
            $user=User::CommunityUser();
        }else{
            $user= $this->belongsTo(User::class, 'ToUser_id');
        }
        return $user;
    }

    public static function Purgue(){
        self::where('CanDelete',true)->orWhere(function($query){
                $query->where('ToUser_id',User::COMUNITY_ID)
                      ->where('FromUser_id',User::COMUNITY_ID);
        })->delete();//mirar que funcioni
      
    }
}
