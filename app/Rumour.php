<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rumour extends Model
{
    use Translatable;
    use SoftDeletes;
    const MIN_TRUST=0;
    const MAX_TRUST=100;

    public $translatedAttributes = ['Title', 'Description'];
    public function GetTitle(){
        return Translate::Get($this,'Title');
    }
    public function GetDescription(){
        return Translate::Get($this,'Description');
    }
    public function ImgCover()
    {
        return $this->belongsTo(File::class, 'ImgCover_id');
    }
    public function ImgPreview()
    {
       return  $this->belongsTo(File::class, 'ImgPreview_id');

    }
    public function EventMaker()
    {
        return $this->belongsTo(EventMaker::class, 'event_maker_id');
    }
    public function User()
    {
        return $this->belongsTo(User::class);
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
                                ->where('ToConfirmed',$isConfirmed)
                                ->whereNotNull('VerifiedBy_id')
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
            $notification->dummy = !($notification->dummy==1);
            $notification->save();
        }
    }
    function GetNotify($user){
        return NotificationChangeRumour::where('rumour_id',$this->id)->where('user_id',$user->id)->first();
    }
    public function IsNotified($user){
        return $this->GetNotify($user)!=null;
    }
    public function SetNotify($user){
        if($this->GetNotify($user)==null){
            $notification=new NotificationChangeRumour();
            $notification->rumour_id=$this->id;
            $notification->user_id=$user->id;
            $notification->save();
        }
    }
    public function UnsetNotify($user){
        $notification=$this->GetNotify($user);
        if($notification!=null){
            $notification->delete();
        }
    }
    function GetLike($user){
        return LikeRumour::where('user_id',$user->id)->where('rumour_id',$this->id)->first();
    }
    public function HasLike($user){
        $like=$this->GetLike($user);
        return $like!=null && $like->Like;
    }
    public function HasTrust($user){
        $like=$this->GetLike($user);
        return $like!=null && $like->Trust;
    }
    public function SetLike($user){
        $like=$this->GetLike($user);
        if($like==null){
            $like=new LikeRumour();
            $like->rumour_id=$this->id;
            $like->user_id=$user->id;
            $like->Like=true;
            $like->Trust=false;
            $like->save();
        }else if(!$like->Like){
            $like->Like=true;
            $like->save();
        }
    }
    public function UnsetLike($user){
        $like=$this->GetLike($user);
        if($like!=null){
            $like->delete();
        }
    }

    public function SetTrust($user){
        $like=$this->GetLike($user);
        if($like==null){
            $like=new LikeRumour();
            $like->event_id=$this->id;
            $like->user_id=$user->id;
            $like->Trust=true;
            $like->Like=false;
            $like->save();
        }else if(!$like->Trust){
            $like->Trust=true;
            $like->save();
        }
    }
    public function UnsetTrust($user){
        $like=$this->GetLike($user);
        if($like!=null){
            if(!$like->Like){
            $like->delete();
            }else{
                $like->Trust=false;
                $like->save();
            }
        }
    }
    public function TotalLikes(){
        return LikeRumour::where('rumour_id',$this->id)->where('Like',true)->count();
    }
    public function TotalTrust(){
        return LikeRumour::where('rumour_id',$this->id)->where('Trust',true)->count();
    }
}
