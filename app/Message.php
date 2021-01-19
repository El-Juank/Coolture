<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public function From(){
        $user= $this->belongsTo(User::class, 'FromUser_id');
        if($user==null)
        {
            $user=User::CommunityUser();
        }
        return $user;
    }
    public function To(){
        $user= $this->belongsTo(User::class, 'ToUser_id');
        if($user==null)
        {
            $user=User::CommunityUser();
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
