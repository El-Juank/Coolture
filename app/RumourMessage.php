<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

class RumourMessage extends Model
{
    use Translatable;
    protected $table="RumourMessages";

    public $translatedAttributes=['Message'];

    public function User(){
        return $this->belongsTo(User::class);
    }
    public function IsComunityManaged(){
        return $this->user_id==null;
    }
    public function Rumour(){
        return $this->belongsTo(Rumour::class);
    }
    public static function Purgue(){
        self::where('CanDelete',true)->delete();//mirar que funcioni
      
    }
    function GetLike($user){
        return LikeRumourMessage::where('user_id',$user->id)->where('rumour_message_id',$this->id)->first();
    }
    public function HasLike($user){
        return $this->GetLike($user)!=null;
    }
    public function SetLike($user){
        $like=$this->GetLike($user);
        if($like==null){
            $like=new LikeRumourMessage();
            $like->event_id=$this->id;
            $like->user_id=$user->id;
            $like->save();
        }
    }
    public function UnsetLike($user){
        $like=$this->GetLike($user);
        if($like!=null){
            $like->delete();
        }
    }
}
