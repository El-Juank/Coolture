<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Location;

class LocationUnitTest extends TestCase
{
 
    public function testGetName()
    {
       $this->assertTrue(Location::get()->first()->Name!=null);
    }
}
