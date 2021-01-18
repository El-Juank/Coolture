<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assistance extends Model
{
    protected $table="AssistanceList";
    
    public function User(){
        return $this->belongsTo(User::class);
    }
    public function Event(){
        return $this->belongsTo(Event::class);
    }
    public function Delete(){
        if(!$this->WantToAssist && !$this->Assisted){
            $this->delete();
        }
    }
}
