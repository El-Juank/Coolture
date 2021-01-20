<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Rumour;

class RumourUnitTest extends TestCase
{
    public function testGetUser(){
        $this->assertTrue(Rumour::where('user_id','is not',null)->first()->User()!=null);
    }
    public function testGetEvenMaker(){
        $this->assertTrue(Rumour::where('Event_Maker_id','is not',null)->first()->EventMaker()!=null);
    }
    public function testGetUrlOfficialDenied(){
        $this->assertTrue(Rumour::where('urlOfficialDenied_id','is not',null)->first()->UrlOfficialDenied()!=null);
    }
    public function testGetUrlOfficialConfirmed(){
        $this->assertTrue(Rumour::where('urlOfficialConfirmed_id','is not',null)->first()->UrlOfficialConfirmed()!=null); 
    }

}
