<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventMaker extends Model
{
    use Translatable;
    use SoftDeletes;

    public $translatedAttributes=['Name','Description'];
    public function User()
    {
        return $this->belongsTo(User::class);
    }
    public function ComunityManage(){
        return $this->User==null;
    }
    public function ImgCover()
    {
        return $this->belongsTo(File::class, 'ImgCover_id');
    }
    public function ImgProfile()
    {
        return $this->belongsTo(File::class, 'ImgProfile_id');
    }

    public function Users(){
        return $this->hasMany(User::class);
    }
    public function Events(){
        return $this->hasMany(Event::class);
    }
    public function Rumours(){
        return $this->hasMany(Rumour::class);
    }

    public function Ranges()
    {
        return $this->hasMany(UserRange::class, 'UserRanges');
    }
    public function NotificationChangesList()
    {
        return $this->morphMany(User::class, 'NotificationChangesEventMaker');
    }
    public function Locations()
    {
        return $this->morphMany(Location::class, 'Events');
    }

    public function EventsTags(){
    //$eventIds=array_keys($this->Events);
        //$tags=TagEvent::where('event_id','in',$eventIds)->get();
        //pasar dic key=tag,velue=numRepeticio
   
       // return $tags;
    }
    public function RumoursTags(){
    //$rumoursIds=array_keys($this->Rumours);
        //$tags=TagRumour::where('event_id','in',$rumourIds)->get();
        //pasar dic key=tag,velue=numRepeticio
        //tags Rumours,Tags Events
       // return $tags;
    }

    public function Tags()
    {
    
    }
    

    
}
