<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssistanceList extends Model
{
    public function Users(){
        return $this->hasMany(User::class);
    }
}
