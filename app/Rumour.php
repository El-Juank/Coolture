<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rumour extends Model
{
    use Translatable;
    use SoftDeletes;

    public $translatedAttributes = ['Title', 'Description'];

    public function EventMaker()
    {
        return $this->belongsTo(EventMaker::class, 'Event_Maker_id');
    }
    public function HasEventMaker()
    {
        return $this->EventMaker() != null;
    }
    public function UrlOfficialDenied(){
        return $this->UrlOfficial(false);
    }
    public function UrlOfficialConfirmed(){
        return $this->UrlOfficial(true);
    }
     function UrlOfficial($isConfirmed){
        return UrlRumourToVerify::where('Rumour_id',$this->id)
                                ->where('IsConfirmed',$isConfirmed)
                                ->first();
    }
    public function StillAlive()
    {
        return $this->UrlOfficialDenied() == null || $this->UrlOfficialConfirmed() == null;
    }
    public function IsTrue()
    {
        $isTrue = null;
        if (!$this->StillAlive()) {
            $isTrue = $this->UrlOfficialConfirmed() != null;
        }
        return $isTrue;
    }
}
