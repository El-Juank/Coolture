<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\File;

class FileUnitTest extends TestCase
{
    public function testGetUrl()
    {
       $this->assertTrue(File::get()->first()->Url()!=null);
    }
    //falten més metodes
}
