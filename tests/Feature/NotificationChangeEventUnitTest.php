<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\NotificationChangeEvent;

class NotificationChangeEventUnitTest extends TestCase
{
    public function testGetUser() {
        $this->assertTrue(NotificationChangeEvent::get()->first()->User!=null);
    }
    public function testGetEvent(){
        $this->assertTrue(NotificationChangeEvent::get()->first()->Event!=null);
    }
}
