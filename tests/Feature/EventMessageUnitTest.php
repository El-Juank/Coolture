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
            $correcte=false;
            $correcte=EventMessage::get()->first()->User()!=null;

        }finally{
            $this->assertTrue($correcte);

        }
    }
    public function testIsComunityManagedTrue(){
        try{
            $correcte=false;
            $correcte=EventMessage::whereNull('user_id')->first()->IsComunityManaged();

        }finally{
            $this->assertTrue($correcte);

        }
    }
    public function testIsComunityManagedFalse(){
        try{
            $correcte=false;
            $correcte=EventMessage::whereNotNull('user_id')->first()->IsComunityManaged();

        }finally{
            $this->assertFalse($correcte);

        }
    }
    public function testGetEvent(){
        try{
            $correcte=false;
            $correcte=EventMessage::get()->first()->Event()!=null;

        }finally{
            $this->assertTrue($correcte);

        }
    }
}
