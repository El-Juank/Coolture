<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RoleTranslation extends Model
{
    use SoftDeletes;
    public function Role(){
        return $this->belongsTo(Role::class);
    }
}
