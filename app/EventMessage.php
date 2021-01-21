<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Astrotomic\Translatable\Translatable;

class EventMessage extends Model
{
    use Translatable;


    protected $table="EventMessages";


    public $translatedAttributes=['Message'];

    public function User()
    {
     
        if($this->IsComunityManaged())
        {
            $user=User::CommunityUser();
        }else{
            $user= $this->belongsTo(User::class);
        }
        return $user;
    }
    public function IsComunityManaged(){
        return $this->user_id==null;
    }
    public function Event(){
        return $this->belongsTo(Event::class);
    }
    public static function Purgue(){
        self::where('CanDelete',true)->delete();//mirar que funcioni

    }
}
