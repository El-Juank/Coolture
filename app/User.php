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
    public const COMUNITY_ID = 1;


    public $translatedAttributes = ['CanDelete', 'Description', 'Visible'];

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

    public function GetCanDelete(){
        return Translate::Get($this,'CanDelete');
    }
    public function GetDescription(){
        return Translate::Get($this,'Description');
    }
    public function GetVisible(){
        return Translate::Get($this,'Visible');
    }

    public function Country()
    {
        return $this->belongsTo(Location::class, 'Country_id');
    }
    public function DefaultLocation()
    {
        return $this->belongsTo(Location::class, 'DefaultLocation_id');
    }
    public function Drop()
    {
        //canviem les dades personals per unes fake
    }
    public function ImgProfile()
    {
       return $this->belongsTo(File::class, 'ImgProfile_id');
      
    }
    public function ImgCover()
    {
        if ($this->ImgCover_id == null) {
            $img = File::ImgDefaultCover();
        } else {
            $img = $this->belongsTo(File::class, 'ImgCover_id');
        }
        return $img;
    }
    public function IsFollowing($eventMaker)
    {
        return UserRange::where('user_id', $this->id)->where('event_maker_id', $eventMaker->id)->count();
    }
    public function GetWantToAssist($event)
    {
        return Assistance::where('user_id', $this->id)->where('event_id', $event->id)->where('WantToAssist', true)->count() != 0;
    }
    public function GetAssisted($event)
    {
        return Assistance::where('user_id', $this->id)->where('event_id', $event->id)->where('Assisted', true)->count() != 0;
    }
    public function VerifiedBy()
    {
        return $this->belongsTo(User::class, 'UserVerified_id');
    }
    public function IsVerified()
    {
        return $this->VerifiedBy_id != null;
    }

    public function AssitanceEventList()
    {
        return $this->belongsToMany(Event::class, Assistance::class);
    }
    public function Events()
    {
        return $this->hasMany(Event::class);
    }
    public function UrlRumoursToVerify()
    {
        return $this->hasMany(UrlRumourToVerify::class);
    }
    public function UrlRumoursPendentToVerify()
    {
        $pendentToVerify = [];
        foreach ($this->UrlRumoursToVerify as $url) {
            if (!$url->IsVerified()) {
                array_push($pendentToVerify, $url);
            }
        }
        return $pendentToVerify;
    }
    public function Messages()
    {
        //only first id!= from and To
        //per fer
        //quan s'elimini un usuari definitivament l'unic que farem será canviar les dades personals per altres faker
    }
    public function MessagesFrom()
    {
        return $this->hasMany(Message::class, 'FromUser_id');
    }
    public function MessagesTo()
    {
        return $this->hasMany(Message::class, 'ToUser_id');
    }
    public function RumourMessages()
    {
        return $this->hasMany(RumourMessage::class);
    }
    public function EventMessages()
    {
        return $this->hasMany(EventMessage::class);
    }
    public function LikeEvents()
    {
        return $this->hasMany(LikeEvent::class);
    }
    public function LikeEventMessages()
    {
        return $this->hasMany(LikeEventMessage::class);
    }
    public function LikeRumours()
    {
        return $this->hasMany(LikeRumour::class);
    }
    public function LikeRumourMessages()
    {
        return $this->hasMany(LikeRumourMessage::class);
    }
    public function Ranges()
    {
        return $this->hasMany(UserRange::class);
    }
    public function EventMakers()
    {
        return $this->belongsToMany(EventMaker::class, UserRange::class);
    }
    public function Permissions()
    {
        return $this->hasMany(Permission::class);
    }
    public function PermissionsGranted()
    {
        return $this->hasMany(Permission::class, 'GrantedBy_id');
    }
    public function Roles()
    {
        return $this->belongsToMany(Role::class, Permission::class);
    }

    public function IsAdmin()
    {

        return $this->Is(Role::ADMIN);
    }
    public function IsMod()
    {

        return $this->Is(Role::MOD);
    }
    public function IsUrlVerified()
    {

        return $this->Is(Role::URL_VERIFIED);
    }
    public function IsEventMakerEditor()
    {

        return $this->Is(Role::EVENTMAKER_EDITOR);
    }
    public function Is($roleId)
    {

        return Permission::where('User_id', $this->id)->where('Role_id', $roleId)->count() == 1;
    }
    public function TotalNotificationChanges(){
        $total=NotificationChangeEvent::where('user_id',$this->id)->count();
        $total+=NotificationChangeEventMaker::where('user_id',$this->id)->count();
        $total+=NotificationChangeRumour::where('user_id',$this->id)->count();
        return $total;
    }
    public function ClearNotificationChangeEvents()
    {
        foreach (NotificationChangeEvent::where('user_id', $this->id)->get() as $notification)
            $notification->save();
    }
    public function ClearNotificationChangeEventMakers()
    {
        foreach (NotificationChangeEventMaker::where('user_id', $this->id)->get() as $notification)
            $notification->save();
    }

    public function ClearNotificationChangeRumours()
    {
        foreach (NotificationChangeRumour::where('user_id', $this->id)->get() as $notification)
            $notification->save();
    }

    public function NotificationChangesEvent($onlyUnRead = true)
    {

        return $this->FilterOnlyUnRead(NotificationChangeEvent::class, $onlyUnRead);
    }
    public function NotificationChangesEventMaker($onlyUnRead = true)
    {

        return $this->FilterOnlyUnRead(NotificationChangeEventMaker::class, $onlyUnRead);
    }

    public function NotificationChangesRumour($onlyUnRead = true)
    {

        return $this->FilterOnlyUnRead(NotificationChangeRumour::class, $onlyUnRead);
    }

    //aixi serveix per totes les notificacions
    private function FilterOnlyUnRead($notificationsType, $onlyUnRead)
    {
        $notifications = $this->hasMany($notificationsType)->get();

        $toShow = array();

        foreach ($notifications as $notification) {

            if (!$onlyUnRead || $notification->UnRead()) {

                array_push($toShow, $notification);
            }
        }



        return $toShow;
    }

    public static function CanEditPermission($userAdmin, $userToDelete, $roleId)
    {
        $canEdit = $userAdmin->IsAdmin();
        if ($canEdit) {
            //un administrador no pot deixar ell mateix el càrrec ha de ser un altre qui ho faci
            $canEdit = !($roleId == Role::ADMIN && $userToDelete->IsAdmin() && $userAdmin->id == $userToDelete->id);
        }
        return $canEdit;
    }
    public static function DeletePermission($userAdmin, $userToDelete, $roleId)
    {
        $deleted = $userToDelete->Is($roleId) && self::CanEditPermission($userAdmin, $userToDelete, $roleId);
        if ($deleted) {
            Permission::where('User_id', $userToDelete->id)
                ->where('Role_id', $roleId)
                ->delete();
        }
        return $deleted;
    }
    public static function GrantPermission($userAdmin, $userToGrant, $roleId)
    {
        $granted = !$userToGrant->Is($roleId) && self::CanEditPermission($userAdmin, $userToGrant, $roleId);
        if ($granted) {
            $permission = new Permission();
            $permission->GrantedBy_id = $userAdmin->id;
            $permission->User_id = $userToGrant->id;
            $permission->Role_id = $roleId;

            $permission->save();
        }
        return $granted;
    }
    public static function CommunityUser()
    {
        return User::find(self::COMUNITY_ID);
    }
}
