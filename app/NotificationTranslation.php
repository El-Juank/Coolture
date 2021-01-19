<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NotificationTranslation extends Model
{
    use SoftDeletes;
    public function Notification(){
        return $this->belongsTo(Notification::class);
    }
}
