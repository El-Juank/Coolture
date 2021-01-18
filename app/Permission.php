<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Model
{
    use SoftDeletes;



    public function User(){
        return $this->belongsTo(User::class);
    }
    public function GrantedBy(){
        return $this->belongsTo(User::class,'GrantedBy_id');
    }
    public function Role(){
        return $this->belongsTo(Role::class);
    }
}
