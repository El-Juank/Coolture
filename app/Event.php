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
        return $this->belongsTo(File::class, 'ImgEvent_id');
    }
    public function ImgPreview()
    {
        return $this->belongsTo(File::class, 'ImgPreview_id');
    }


    public function Users()
    {
        return $this->hasMany(User::class);
    }

    public function Likes()
    {
        return $this->hasMany(LikeEvent::class);
    }
    public function Messages()
    {
        return $this->hasMany(MessageEvent::class);
    }
    public function NotificationChangeSeen($user){
        $notification=NotificationChangeEvent::where('event_id',$this->id)->where('user_id',$user->id)->first();
        if($notification!=null){
            $notification->save();
        }
    }
    public function SetLike($user){
        $like=LikeEvent::where('user_id',$user->id)->where('event_id',$this->id)->first();
        if($like==null){
            $like=new LikeEvent();
            $like->event_id=$this->id;
            $like->user_id=$user->id;
            $like->save();
        }
    }
    public function UnsetLike($user){
        $like=LikeEvent::where('user_id',$user->id)->where('event_id',$this->id)->first();
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
        return $this->belongsToMany(TagEvent::class, EventTag::class);
    }

    public function NotificationChangesList()
    {
        return $this->belongsToMany(User::class, NotificationChangeEvent::class);
    }
}
