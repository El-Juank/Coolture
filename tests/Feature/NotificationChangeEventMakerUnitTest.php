<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\NotificationChangeEventMaker;

class NotificationChangeEventMakerUnitTest extends TestCase
{
    public function testGetUser() {
        $this->assertTrue(NotificationChangeEventMaker::get()->first()->User()!=null);
    }
    public function testGetEventMaker(){
        $this->assertTrue(NotificationChangeEventMaker::get()->first()->EventMaker()!=null);
    }
}
