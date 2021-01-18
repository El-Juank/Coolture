<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UrlRumourToVerify extends Model
{
    public function User()
    {
        return $this->belongsTo(User::class);
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
        return $this->VerifiedBy()!=null;
    }
    public function Verified($userVerifiedBy, $isTrue)
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
