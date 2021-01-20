<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\TagEvent;

class TagEventUnitTest extends TestCase
{
    public function testGetEvent() {
        $this->assertTrue(TagEvent::get()->first()->Event()!=null);
    }
    public function testGetTag(){
        $this->assertTrue(TagEvent::get()->first()->Tag()!=null);
    }
}
