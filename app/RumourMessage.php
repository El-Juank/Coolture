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
    public function Rumour(){
        return $this->belongsTo(Rumour::class);
    }
    public static function Purgue(){
        $messages=self::all();
        for($i=0,$f=count($messages);$i<$f;$i++){
            if($messages[$i]->CanDelete){
                $messages[$i]->delete();
            }
        }
    }
}
