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

    public function EventTags(){
        return $this->GetDictionaryTags($this->Events,'Event');
    }
    public function RumourTags(){
        return $this->GetDictionaryTags($this->Rumours,'Rumour');
    }
    private function GetDictionaryTags($objs,$name){//falta testing
        $objIds=array();
        foreach($objs as $objId){
          array_push( $objIds,$objId->Id);
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
        $tagsEvents=$this->EventsTags;
        $tagsRumours=$this->RumoursTags;
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
    

    
}
