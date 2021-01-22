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

    public $translatedAttributes=['Name','Description'];
    protected $table="EventMakers";

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
    public function Follow($user){
       if(UserRange::where('user_id',$user->id)->count()==0){
           $userRange=new UserRange();
           $userRange->user_id=$user->id;
           $userRange->Event_Maker_id=$this->id;
           $userRange->save();
       } 
    }
    public function UnFollow($user){
        UserRange::where('user_id',$user->id)->delete();
     }
    public function ComunityManage(){
        return $this->user_id==null;
    }
    public function ImgCover()
    {
        return $this->belongsTo(File::class, 'ImgCover_id');
    }
    public function ImgProfile()
    {
        return $this->belongsTo(File::class, 'ImgProfile_id');
    }

    public function Followers(){
        return $this->belongsToMany(User::class,UserRange::class);
    }
    public function Events(){
        return $this->hasMany(Event::class);
    }
    public function Rumours(){
        return $this->hasMany(Rumour::class);
    }

    public function Ranges()
    {
        return $this->hasMany(UserRange::class);
    }
    public function Subcategories()
    {
        return $this->belongsToMany(Category::class,Subcategory::class);
    }
    public function NotificationChangesList()
    {
        return $this->belongsToMany(User::class, NotificationChangeEventMaker::class);
    }
    public function Locations()
    {
        return $this->belongsToMany(Location::class, Event::class);
    }

    public function EventTags(){
        return $this->GetDictionaryTags($this->Events(),'Event');
    }
    public function RumourTags(){
        return $this->GetDictionaryTags($this->Rumours(),'Rumour');
    }
    private function GetDictionaryTags($objs,$name){//falta testing
        $objIds=array();
        foreach($objs as $objId){
          array_push( $objIds,$objId->id);
        }
        $ids=DB::table('Tags'.$name)->where($name.'_Id','in',$objIds)->get()->pluck('Tag_Id');
        $tags=Tag::select(['Name' ,DB::raw('COUNT(Name) as Total')])->where('Id','in',$ids)->groupBy('Name')->orderBy('Name')->pluck('Name','Total');
        $dic=array();
        foreach($tags as $tagName=>$total){
           $dic[$tagName]=$total;
        }
        return $tags;
    }

    public function Tags()
    {//falta testing
        $tagsEvents=$this->EventsTags();
        $tagsRumours=$this->RumoursTags();
        $tags=$tagsEvents;

        foreach($tagsRumours as $tagRumour){
            if(array_key_exists($tagRumour,$tags)){
                $tags[$tagRumour]+=$tagsRumours[$tagRumour];
            }else{
                $tags+=[$tagRumour=>$tagsRumours[$tagRumour]];
            }
        }

        return $tags;

    }

    public function NotificationChangeSeen($user){
        $notification=NotificationChangeEventMaker::where('event_maker_id',$this->id)->where('user_id',$user->id)->first();
        if($notification!=null){
            $notification->save();
        }
    }

}
