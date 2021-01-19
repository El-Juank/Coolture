<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LocationTranslation extends Model
{
   use SoftDeletes;
   public function Location(){
      return $this->belongsTo(Location::class);
  }
}
