<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\NotificationChangeRumour;

class NotificationChangeRumourUnitTest extends TestCase
{
    public function testGetUser() {
        $this->assertTrue(NotificationChangeRumour::get()->first()->User!=null);
    }
    public function testGetRumour(){
        $this->assertTrue(NotificationChangeRumour::get()->first()->Rumour!=null);
    }
}
