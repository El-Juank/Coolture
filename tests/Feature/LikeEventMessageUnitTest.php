<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\LikeEventMessage;

class LikeEventMessageUnitTest extends TestCase
{
    public function testGetUser(){
        $this->assertTrue(LikeEventMessage::get()->first()->User!=null);
    }
    public function testGetEventMessage(){
        $this->assertTrue(LikeEventMessage::get()->first()->EventMessage!=null);
    }
}
