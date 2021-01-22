<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rumour extends Model
{
    use Translatable;
    use SoftDeletes;

    public $translatedAttributes = ['Title', 'Description'];

    public function EventMaker()
    {
        return $this->belongsTo(EventMaker::class, 'Event_Maker_id');
    }
    public function User()
    {
        $user= $this->belongsTo(User::class);
        if($user==null)
        {
            $user=User::CommunityUser();
        }
        return $user;
    }
    public function HasEventMaker()
    {
        return $this->Event_Maker_id != null;
    }
    public function UrlOfficialDenied(){
        return $this->UrlOfficial(false);
    }
    public function UrlOfficialConfirmed(){
        return $this->UrlOfficial(true);
    }
     function UrlOfficial($isConfirmed){
        return UrlRumourToVerify::where('Rumour_id',$this->id)
                                ->where('IsConfirmed',$isConfirmed)
                                ->first();
    }
    public function StillAlive()
    {
        return $this->UrlOfficialDenied() == null || $this->UrlOfficialConfirmed() == null;
    }
    public function IsTrue()
    {
        $isTrue = null;
        if (!$this->StillAlive()) {
            $isTrue = $this->UrlOfficialConfirmed() != null;
        }
        return $isTrue;
    }
    public function NotificationChangeSeen($user){
        $notification=NotificationChangeRumour::where('rumour_id',$this->id)->where('user_id',$user->id)->first();
        if($notification!=null){
            $notification->save();
        }
    }
    public function SetLike($user){
        $like=LikeRumour::where('user_id',$user->id)->where('rumour_id',$this->id)->first();
        if($like==null){
            $like=new LikeRumour();
            $like->event_id=$this->id;
            $like->user_id=$user->id;
            $like->save();
        }
    }
    public function UnsetLike($user){
        $like=LikeRumour::where('user_id',$user->id)->where('rumour_id',$this->id)->first();
        if($like!=null){
            $like->delete();
        }
    }
}
