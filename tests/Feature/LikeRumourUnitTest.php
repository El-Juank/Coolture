<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\LikeRumour;

class LikeRumourUnitTest extends TestCase
{
    public function testGetUser(){
        $this->assertTrue(LikeRumour::get()->first()->User()!=null);
    }
    public function testGetRumour(){
        $this->assertTrue(LikeRumour::get()->first()->Rumour()!=null);
    }
}
