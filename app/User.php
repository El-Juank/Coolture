<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Astrotomic\Translatable\Translatable;

class User extends Authenticatable
{
    use Notifiable;
    use Translatable;

    public $translatedAttributes=['CamDelete','Description','Visible'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function Country(){
        return $this->belongsTo(Location::class,'Country_id');
    }
    public function DefaultLocation(){
        return $this->belongsTo(Location::class,'DefaultLocation_id');
    }
    public function ImgProfile(){
        return $this->belongsTo(File::class,'ImgProfile_id');
    }
    public function ImgCover(){
        return $this->belongsTo(File::class,'ImgCover_id');
    }
    public function UserVerified(){
        return $this->belongsTo(User::class,'UserVerified_id');
    }
    public function IsVerified(){
        return $this->UserVerified!=null;
    }

    public function AssitenceList(){
        return $this->hasMany(AssitenceList::class);
    }
    public function Events(){
        return $this->hasMany(Events::class);
    }
    public function Messages(){
        return $this->hasMany(Message::class);
    }
    public function RumourMessages(){
        return $this->hasMany(RumourMessage::class);
    }
    public function EventMessages(){
        return $this->hasMany(EventMessage::class);
    }
    public function LikeEvent(){
        return $this->hasMany(LikeEvent::class);
    }
    public function LikeEventMessages(){
        return $this->hasMany(LikeEventMessage::class);
    }
    public function LikeRumours(){
        return $this->hasMany(LikeRumour::class);
    }
    public function Ranges(){
        return $this->hasMany(UserRange::class);
    }
    public function EventMakers(){
        return $this->hasMany(EventMaker::class);
    }
    public function Permissions(){
        return $this->hasMany(Permission::class);
    }
    public function Roles(){
        return $this->hasMany(Role::class);
    }
    //quan estigui probat copy and paste amb
    public function NotificationChangesEvent($onlyUnRead=true){
        $notificacions= $this->hasMany(NotificationChangeEvent::class);
        
        return $this->FilterOnlyUnRead($notificacions,$onlyUnRead);

    }

    //aixi serveix per totes les notificacions
    private function FilterOnlyUnRead($notifications,$onlyUnRead){
        if($onlyUnRead){
            $toShow=array();
            foreach($notifications as $notification){
                if($notification->UnRead)
                {
                    $toShow+=[$notification];
                }
            }
        }else{
            $toShow=$notifications;
        }
        return $toShow;
    }
}
