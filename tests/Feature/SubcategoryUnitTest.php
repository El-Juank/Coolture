<?php

namespace Tests\Feature;

use App\Subcategory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;


class SubcategoryUnitTest extends TestCase
{
    public function testGetCategory(){
        $this->assertTrue(Subcategory::whereNotNull('Category_id')->first()->Category()!=null);
    }
    public function testGetEvenMaker(){
        $this->assertTrue(Subcategory::whereNotNull('Event_Maker_id')->first()->EventMaker()!=null);
    }
}
