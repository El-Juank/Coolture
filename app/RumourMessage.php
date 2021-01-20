<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

class RumourMessage extends Model
{
    use Translatable;
    protected $table="RumourMessages";

    public $translatedAttributes=['Message'];

    public function User(){
        return $this->belongsTo(User::class);
    }
    public function IsComunityManaged(){
        return $this->user_id==null;
    }
    public function Rumour(){
        return $this->belongsTo(Rumour::class);
    }
    public static function Purgue(){
        self::where('CanDelete',true)->delete();//mirar que funcioni

    }
}
