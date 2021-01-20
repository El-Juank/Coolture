<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Category;

class CategoryUnitTest extends TestCase
{
    public function testGetImage(){
        $category=Category::whereNotNull('Img_id')->first();
        $this->assertTrue($category->Image()!=null);
    }
    public function testGetIcon(){
        $category=Category::whereNotNull('ImgIcon_id')->first();
        $this->assertTrue($category->Icon()!=null);
    }
}
