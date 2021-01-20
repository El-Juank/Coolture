<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Category;

class CategoryUnitTest extends TestCase
{
    public function testImage(){
        $category=Category::where('Image_id','<>',null)->first();
        $this->assertTrue($category->Image()!=null);
    }
}
