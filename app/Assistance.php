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
        $doit=!$this->WantToAssist && !$this->Assisted;
        if($doit){
            $this->delete();
        }
        return $doit;
    }
}
