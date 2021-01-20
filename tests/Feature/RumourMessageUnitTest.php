<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\RumourMessage;

class RumourMessageUnitTest extends TestCase
{
    public function testGetUser(){
        try{
          
            $correcte=RumourMessage::get()->first()->User()!=null;

        }catch(object $e){
            $correcte=false;

        }finally{
            $this->assertTrue($correcte);

        }
    }
    public function testIsComunityManagedTrue(){
        try{
          
            $correcte=RumourMessage::where('user_id','is','null')->first()->IsComunityManaged();

        }catch(object $e){
            $correcte=false;

        }finally{
            $this->assertTrue($correcte);

        }
    }
    public function testIsComunityManagedFalse(){
        try{
          
            $correcte=RumourMessage::where('user_id','is not','null')->first()->IsComunityManaged();

        }catch(object $e){
            $correcte=false;

        }finally{
            $this->assertFalse($correcte);

        }
    }
    public function testGetRumour(){
        try{
          
            $correcte=RumourMessage::get()->first()->Rumour()!=null;

        }catch(object $e){
            $correcte=false;

        }finally{
            $this->assertTrue($correcte);

        }
    }
}
