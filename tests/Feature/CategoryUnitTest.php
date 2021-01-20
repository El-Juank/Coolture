<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Category;

class CategoryUnitTest extends TestCase
{
    public function testGetImage(){
        $category=Category::where('Img_id','is not',null)->first();
        $this->assertTrue($category->Image()!=null);
    }
    public function testGetIcon(){
        $category=Category::where('ImgIcon_id','is not',null)->first();
        $this->assertTrue($category->Icon()!=null);
    }
}
