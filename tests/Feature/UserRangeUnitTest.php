<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\UserRange;

class UserRangeUnitTest extends TestCase
{
    public function testGetEventMaker() {
        $this->assertTrue(UserRange::get()->first()->EventMaker()!=null);
    }
    public function testGetUser(){
        $this->assertTrue(UserRange::get()->first()->User()!=null);
    }
}
