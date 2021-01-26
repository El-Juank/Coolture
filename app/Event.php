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
    public function GetTitle(){
        return Translate::Get($this,'Title');
    }
    public function GetDescription(){
        return Translate::Get($this,'Description');
    }
    public function User()
    {

        return  $this->belongsTo(User::class);
    }
    public function ComunityManage(){
        return $this->user_id==User::COMUNITY_ID;
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
       return  $this->belongsTo(File::class, 'ImgPreview_id');

    }


    public function Users()
    {
        return $this->belongsToMany(User::class,Assistance::class);
    }

    public function UsersLiked()
    {
        return $this->belongsToMany(User::class,LikeEvent::class);
    }
    public function Likes(){
        return LikeEvent::where('event_id',$this->id)->count();
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
    public function TotalWantToAssist(){
        return Assistance::where('event_id',$this->id)->where('WantToAssist',true)->count();
    }
    public function TotalAssisted(){
        return Assistance::where('event_id',$this->id)->where('Assisted',true)->count();
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
