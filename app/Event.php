<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use Translatable;
    use SoftDeletes;

    public $translatedAttributes = ['Title', 'Description'];
    public function User()
    {
     
        if($this->user_id==null)
        {
            $user=User::CommunityUser();
        }else{
            $user= $this->belongsTo(User::class);
        }
        return $user;
    }
    public function EventMaker()
    {
        return $this->belongsTo(EventMaker::class);
    }
    public function Location()
    {
        return $this->belongsTo(Location::class);
    }
    public function ImgEvent()
    {
        if($this->ImgEvent_id!=null){
        $img= $this->belongsTo(File::class, 'ImgEvent_id');
        }else{
            $img=File::ImgDefaultCover();
        }
        return $img;
    }
    public function ImgPreview()
    {
        if($this->ImgEvent_id!=null){
            $img= $this->belongsTo(File::class, 'ImgPreview_id');
            }else{
                $img=File::ImgDefaultCover();
            }
            return $img;
        
    }


    public function Users()
    {
        return $this->belongsToMany(User::class,Assistance::class);
    }

    public function Likes()
    {
        return $this->belongsToMany(User::class,LikeEvent::class);
    }
    public function Messages()
    {
        return $this->hasMany(EventMessage::class);
    }
    public function NotificationChangeSeen($user){
        $notification=NotificationChangeEvent::where('event_id',$this->id)->where('user_id',$user->id)->first();
        if($notification!=null){
            $notification->save();
        }
    }
    public function UserWantToAssist($user){
        return Assistance::where('user_id',$user->id)->where('event_id',$this->id)->where('WantToAssist',true)->count()!=0;
    }
    public function UserAssisted($user){
        return Assistance::where('user_id',$user->id)->where('event_id',$this->id)->where('Assisted',true)->count()!=0;
    }
    function GetLike($user){
        return LikeEvent::where('user_id',$user->id)->where('event_id',$this->id)->first();
    }
    public function SetLike($user){
        $like=$this->GetLike($user);
        if($like==null){
            $like=new LikeEvent();
            $like->event_id=$this->id;
            $like->user_id=$user->id;
            $like->save();
        }
    }
    public function HasLike($user){
        return $this->GetLike($user)!=null;
    }
    public function UnsetLike($user){
        $like=$this->GetLike($user);
        if($like!=null){
            $like->delete();
        }
    }

    public function AssistanceUserList()
    {
        return $this->belongsToMany(User::class, Assistance::class);
    }

    public function Tags()
    {
        return $this->belongsToMany(Tag::class, TagEvent::class);
    }

    public function NotificationChangesList()
    {
        return $this->belongsToMany(User::class, NotificationChangeEvent::class);
    }
}
