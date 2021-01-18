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
        return $this->EventMaker != null;
    }
    public function StillAlive()
    {
        return $this->Url_OfficialDenied == null || $this->Url_OfficialConfirmed == null;
    }
    public function IsTrue()
    {
        $isTrue = null;
        if (!$this->StillAlive) {
            $isTrue = $this->Url_OfficialConfirmed != null;
        }
        return $isTrue;
    }
}
