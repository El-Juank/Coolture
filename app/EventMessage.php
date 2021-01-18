<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Astrotomic\Translatable\Translatable;

class EventMessage extends Model
{
    use Translatable;
    protected $table="EventMessages";

    public $translatedAttributes=['Message'];

    public function User(){
        return $this->belongsTo(User::class);
    }
    public function Event(){
        return $this->belongsTo(Event::class, 'Event_id');
    }
}
