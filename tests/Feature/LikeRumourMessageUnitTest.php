<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\LikeRumourMessage;

class LikeRumourMessageUnitTest extends TestCase
{
    public function testGetUser(){
        $this->assertTrue(LikeRumourMessage::get()->first()->User()!=null);
    }
    public function testGetRumourMessage(){
        $this->assertTrue(LikeRumourMessage::get()->first()->RumourMessage()!=null);
    }
}
