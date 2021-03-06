<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventMaker extends Model
{
    use Translatable;
    use SoftDeletes;

    public $translatedAttributes = ['Name', 'Description'];
    protected $table = "EventMakers";
    public function GetName()
    {
        return Translate::Get($this, 'Name');
    }
    public function GetDescription()
    {
        return Translate::Get($this, 'Description');
    }
    public function User()
    {
        return $this->belongsTo(User::class);
    }
    public function Follow($user, $event_maker_id)
    {
        if (UserRange::where('user_id', $user->id)->where('event_maker_id', $event_maker_id)->count() == 0) {
            $userRange = new UserRange();
            $userRange->user_id = $user->id;
            $userRange->Event_Maker_id = $this->id;
            $userRange->save();
        }
    }
    public function UnFollow($user, $event_maker_id)
    {
        UserRange::where('user_id', $user->id)->where('event_maker_id', $event_maker_id)->delete();
    }
    function GetNotify($user){
        return NotificationChangeEventMaker::where('event_maker_id',$this->id)->where('user_id',$user->id)->first();
    }
    public function IsNotified($user){
        return $this->GetNotify($user)!=null;
    }
    public function SetNotify($user){
        if($this->GetNotify($user)==null){
            $notification=new NotificationChangeEventMaker();
            $notification->event_maker_id=$this->id;
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
    public function ComunityManage()
    {
        return $this->user_id == User::COMUNITY_ID;
    }
    public function ImgProfile()
    {
        return $this->belongsTo(File::class, 'ImgProfile_id');
    }
    public function ImgCover()
    {
        return $this->belongsTo(File::class, 'ImgCover_id');
    }

    public function Followers()
    {
        return $this->belongsToMany(User::class, UserRange::class);
    }
    public function Events()
    {
        return $this->hasMany(Event::class);
    }
    public function Rumours()
    {
        return $this->hasMany(Rumour::class);
    }

    public function Ranges()
    {
        return $this->hasMany(UserRange::class);
    }
    public function Subcategories()
    {
        return $this->belongsToMany(Category::class, Subcategory::class);
    }
    public function NotificationChangesList()
    {
        return $this->belongsToMany(User::class, NotificationChangeEventMaker::class);
    }
    public function Locations()
    {
        return $this->belongsToMany(Location::class, Event::class);
    }

    public function EventTags()
    {
        return $this->GetDictionaryTags($this->Events(), 'Event');
    }
    public function RumourTags()
    {
        return $this->GetDictionaryTags($this->Rumours(), 'Rumour');
    }
    private function GetDictionaryTags($objs, $name)
    { //falta testing
        $objIds = array();
        foreach ($objs as $objId) {
            array_push($objIds, $objId->id);
        }
        $ids = DB::table('Tags' . $name)->where($name . '_Id', 'in', $objIds)->get()->pluck('Tag_Id');
        $tags = Tag::select(['Name', DB::raw('COUNT(Name) as Total')])->where('Id', 'in', $ids)->groupBy('Name')->orderBy('Name')->pluck('Name', 'Total');
        $dic = array();
        foreach ($tags as $tagName => $total) {
            $dic[$tagName] = $total;
        }
        return $tags;
    }

    public function Tags()
    {
        /*
        $tagsEvents=$this->EventsTags();
        $tagsRumours=$this->RumoursTags();
        $tags=$tagsEvents;

        foreach($tagsRumours as $tagRumour=>$tagValue){
            if(array_key_exists($tagRumour,$tags)){
                $tags[$tagRumour]+=$tagValue;
            }else{
                $tags+=[$tagRumour=>$tagValue];
            }
        }

        return $tags;
        */
        return array();
    }

    public function NotificationChangeSeen($user)
    {
        $notification = NotificationChangeEventMaker::where('event_maker_id', $this->id)->where('user_id', $user->id)->first();
        if ($notification != null) {
            $notification->dummy = !($notification->dummy==1);
            $notification->save();
        }
    }
}
