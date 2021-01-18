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
        return $this->belongsTo(User::class, 'User_id');
    }
    public function EventMaker()
    {
        return $this->belongsTo(EventMaker::class, 'Event_Maker_id');
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

    public function AssistenceList()
    {
        return $this->morphMany(User::class, 'AssistenceList');
    }

    public function Tags()
    {
        return $this->morphMany(TagEvent::class, 'EventTags');
    }

    public function NotificationChangesList()
    {
        return $this->morphMany(User::class, 'NotificationChangesEvent');
    }
}
