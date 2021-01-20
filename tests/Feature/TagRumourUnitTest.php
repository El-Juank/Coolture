<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\TagRumour;

class TagRumourUnitTest extends TestCase
{
    public function testGetRumour() {
        $this->assertTrue(TagRumour::get()->first()->Rumour()!=null);
    }
    public function testGetTag(){
        $this->assertTrue(TagRumour::get()->first()->Tag()!=null);
    }
}
