<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UrlRumourToVerify extends Model
{
    protected $table="UrlRumoursToVerify";
    
    public function User()
    {
       return  $this->belongsTo(User::class);
    }
    public function Rumour()
    {
        return $this->belongsTo(Rumour::class);
    }
    public function VerifiedBy()
    {
        return $this->belongsTo(User::class, 'VerifiedBy_id');
    }
    public function IsVerified()
    {
        return $this->VerifiedBy_id!=null;
    }
    public function IsComunityArchived()
    {
        return $this->user_id==null;
    }
    public function SetVerified($userVerifiedBy, $isTrue)
    {
        if (!$isTrue) {
            $this->delete();
        } else {
            $this->VerifiedBy_id = $userVerifiedBy->id;
            $this->save();
            //elimino les altres urls ja que s'ha verificat
            UrlRumourToVerify::where('Rumour_Id', $this->Rumour_id)
                ->where('IsConfirmed', $this->IsConfirmed)
                ->where('id','<>',$this->id)//així no elimina el que confirma
                ->delete();
        }
    }
}
