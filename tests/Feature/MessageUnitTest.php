<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Message;

class MessageUnitTest extends TestCase
{
    public function testGetFrom(){
        $this->assertTrue(Message::get()->first()->From!=null);
    }
    public function testGetTo(){
        $this->assertTrue(Message::get()->first()->To!=null);
    }
    public function testVisibilityTrue(){
        $this->assertTrue(Message::where('Visibility',true)->first()->Visibility);
    }
    public function testVisibilityFalse(){
        $this->assertFalse(Message::where('Visibility',false)->first()->Visibility);
    }
    public function testCanDeleteTrue(){
        $this->assertTrue(Message::where('CanDelete',true)->first()->CanDelete);
    }
    public function testCanDeleteFalse(){
        $this->assertFalse(Message::where('CanDelete',false)->first()->CanDelete);
    }
}
