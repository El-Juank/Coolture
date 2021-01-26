<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Astrotomic\Translatable\Translatable;

class EventMessage extends Model
{
    use Translatable;


    protected $table="EventMessages";


    public $translatedAttributes=['Message'];
    
    public function GetMessage(){
        return Translate::Get($this,'Message');
    }

    public function User()
    {
     return  $this->belongsTo(User::class);
    }
    public function IsComunityManaged(){
        return $this->user_id==User::COMUNITY_ID;
    }
     function GetLike($user){
        return LikeEventMessage::where('user_id',$user->id)->where('event_message_id',$this->id)->first();
    }
    public function HasLike($user){
        return $this->GetLike($user)!=null;
    }
    public function SetLike($user){
        $like=$this->GetLike($user);
        if($like==null){
            $like=new LikeEventMessage();
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
    public function Event(){
        return $this->belongsTo(Event::class);
    }
    public static function Purgue(){
        self::where('CanDelete',true)->delete();//mirar que funcioni

    }
}
