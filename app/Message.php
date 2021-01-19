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
    public function CanDrop(){
        $fromId=$this->From()->id;
        return $this->CanDelete||$this->To()->id==$fromId && $fromId==User::COMUNITY_ID;
    }
    public static function Purgue(){
        $messages=Message::all();
        for($i=0,$f=count($messages);$i<$f;$i++){
            if($messages[$i]->CanDrop())
            {
                $messages[$i]->delete();
            }
        }
    }
}
