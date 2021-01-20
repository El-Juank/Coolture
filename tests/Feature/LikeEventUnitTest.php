<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\LikeEvent;

class LikeEventUnitTest extends TestCase
{
    public function testGetUser(){
        $this->assertTrue(LikeEvent::get()->first()->User()!=null);
    }
    public function testGetEvent(){
        $this->assertTrue(LikeEvent::get()->first()->Event()!=null);
    }
}
