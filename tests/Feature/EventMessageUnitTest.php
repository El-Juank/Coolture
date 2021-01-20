<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\EventMessage;

class EventMessageUnitTest extends TestCase
{
    public function testGetUser(){
        try{
          
            $correcte=EventMessage::get()->first()->User()!=null;

        }catch(object $e){
            $correcte=false;

        }finally{
            $this->assertTrue($correcte);

        }
    }
    public function testIsComunityManagedTrue(){
        try{
          
            $correcte=EventMessage::whereNull('user_id')->first()->IsComunityManaged();

        }catch(object $e){
            $correcte=false;

        }finally{
            $this->assertTrue($correcte);

        }
    }
    public function testIsComunityManagedFalse(){
        try{
          
            $correcte=EventMessage::whereNotNull('user_id')->first()->IsComunityManaged();

        }catch(object $e){
            $correcte=false;

        }finally{
            $this->assertFalse($correcte);

        }
    }
    public function testGetEvent(){
        try{
          
            $correcte=EventMessage::get()->first()->Event()!=null;

        }catch(object $e){
            $correcte=false;

        }finally{
            $this->assertTrue($correcte);

        }
    }
}
