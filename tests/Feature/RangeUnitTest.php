<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Range;

class RangeUnitTest extends TestCase
{
    public function testGetEvent(){
        $this->assertTrue(Range::get()->first()->Event!=null);
    }
    public function testGetLocation(){
        $this->assertTrue(Range::get()->first()->Location!=null);
    }
    public function testGetRange(){
        $this->assertTrue(Range::get()->first()->Range>0);
    }
}
