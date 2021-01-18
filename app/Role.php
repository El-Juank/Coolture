<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;
    
    public const ADMIN=1;
    public const MOD=2;
    public const EVENTMAKER_EDITOR=3;
    public const URL_VERIFIED=4;
}
