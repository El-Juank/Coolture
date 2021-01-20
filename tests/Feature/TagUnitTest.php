<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Tag;

class TagUnitTest extends TestCase
{
    public function testGetName()
    {
       $this->assertTrue(Tag::get()->first()->Name!=null);
    }
}
