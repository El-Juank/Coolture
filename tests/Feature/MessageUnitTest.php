<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Message;

class MessageUnitTest extends TestCase
{
    public function testGetFrom(){
        $this->assertTrue(Message::whereNotNull('FromUser_id')->first()->From()!=null);
    }
    public function testGetTo(){
        $this->assertTrue(Message::whereNotNull('ToUser_id')->first()->To()!=null);
    }

    public function testCanDeleteTrue(){
        $this->assertTrue(Message::where('CanDelete',true)->first()->CanDelete==1);
    }
    public function testCanDeleteFalse(){
        $this->assertFalse(Message::where('CanDelete',false)->first()->CanDelete==1);
    }
}
