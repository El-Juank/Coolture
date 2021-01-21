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
        return $this->belongsTo(EventMaker::class, 'Event_Maker_id');
    }
    public function Location()
    {
        return $this->belongsTo(Location::class, 'Location_id');
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

    public function AssistanceUserList()
    {
        return $this->hasManyThrough(User::class, Assistance::class);
    }

    public function Tags()
    {
        return $this->hasManyThrough(TagEvent::class, EventTag::class);
    }

    public function NotificationChangesList()
    {
        return $this->hasManyThrough(User::class, NotificationChangeEvent::class);
    }
}
