<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Notification;

class NotificationUnitTest extends TestCase
{
    public function testGetMessage()
    {
       $this->assertTrue(Notification::get()->first()->Message!=null);
    }
}
