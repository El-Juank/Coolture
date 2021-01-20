<?php

namespace Tests\Feature;

use App\Subcategory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;


class SubcategoryUnitTest extends TestCase
{
    public function testGetCategory(){
        $this->assertTrue(Subcategory::where('Category_id','is not',null)->first()->Category()!=null);
    }
    public function testGetEvenMaker(){
        $this->assertTrue(Subcategory::where('Event_Maker_id','is not',null)->first()->EventMaker()!=null);
    }
}
