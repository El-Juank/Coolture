<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Astrotomic\Translatable\Translatable;

class EventMessage extends Model
{
    use Translatable;

    
    protected $table="EventMessages";


    public $translatedAttributes=['Message'];

    public function User(){
        $user= $this->belongsTo(User::class, 'User_id');
        if($user==null)
        {
            $user=User::CommunityUser();
        }
        return $user;
    }
    public function Event(){
        return $this->belongsTo(Event::class, 'Event_id');
    }
    public static function Purgue(){
        self::where('CanDelete',true)->delete();//mirar que funcioni
      
    }
}
