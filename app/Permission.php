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
        $user= $this->belongsTo(User::class, 'GrantedBy_id');
        if($user==null)
        {
            $user=User::CommunityUser();
        }
        return $user;
    }
    public function Role(){
        return $this->belongsTo(Role::class);
    }
}
