<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Rumour;

class RumourUnitTest extends TestCase
{
    public function testGetUser(){
        $this->assertTrue(Rumour::whereNotNull('user_id')->first()->User()!=null);
    }
    public function testGetEvenMaker(){
        $this->assertTrue(Rumour::whereNotNull('Event_Maker_id')->first()->EventMaker()!=null);
    }
    public function testGetUrlOfficialDenied(){
        $this->assertTrue(Rumour::whereNotNull('urlOfficialDenied_id')->first()->UrlOfficialDenied()!=null);
    }
    public function testGetUrlOfficialConfirmed(){
        $this->assertTrue(Rumour::whereNotNull('urlOfficialConfirmed_id')->first()->UrlOfficialConfirmed()!=null); 
    }

    public function testGetUrlOfficialDeniedNull(){
        $this->assertTrue(Rumour::whereNull('urlOfficialDenied_id')->first()->UrlOfficialDenied()==null);
    }
    public function testGetUrlOfficialConfirmedNull(){
        $this->assertTrue(Rumour::whereNull('urlOfficialConfirmed_id')->first()->UrlOfficialConfirmed()==null); 
    }

}
