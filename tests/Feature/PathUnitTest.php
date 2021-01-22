<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Path;

class PathUnitTest extends TestCase
{

    public function testGetUrl()
    {
       $this->assertTrue(Path::get()->first()->Url!=null);
    }
    public function testGetFiles()
    {
        $files=Path::get()->first()->Files;
       $this->assertTrue($files!=null&&count($files)!=null);//posso null per que provi la funció count
    }
}
