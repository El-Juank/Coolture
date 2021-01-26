<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\EventMessage;
use App\User;

class EventMessageUnitTest extends TestCase
{
    public function testGetUser(){
        try{
            $correcte=false;
            $correcte=EventMessage::first()->User()!=null;

        }finally{
            $this->assertTrue($correcte);

        }
    }
    public function testIsComunityManagedTrue(){
        try{
            $correcte=false;
            $correcte=EventMessage::where('user_id',User::COMUNITY_ID)->first()->IsComunityManaged();

        }finally{
            $this->assertTrue($correcte);

        }
    }
    public function testIsComunityManagedFalse(){
        try{
            $correcte=false;
            $correcte=EventMessage::where('user_id','<>',User::COMUNITY_ID)->first()->IsComunityManaged();

        }finally{
            $this->assertFalse($correcte);

        }
    }
    public function testGetEvent(){
        try{
            $correcte=false;
            $correcte=EventMessage::first()->Event!=null;

        }finally{
            $this->assertTrue($correcte);

        }
    }
}
