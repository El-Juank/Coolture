<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Rumour;
use App\UrlRumourToVerify;

class RumourUnitTest extends TestCase
{
    public function testGetUser(){
        $this->assertTrue(Rumour::whereNotNull('user_id')->first()->User()!=null);
    }
    public function testGetEvenMaker(){
        $this->assertTrue(Rumour::whereNotNull('Event_Maker_id')->first()->EventMaker!=null);
    }
    public function testGetUrlOfficialDenied(){
        $this->assertTrue(UrlRumourToVerify::where('ToConfirmed',false)->whereNotNull('VerifiedBy_id')->first()->Rumour->UrlOfficialDenied()!=null);
    }
    public function testGetUrlOfficialConfirmed(){
        $this->assertTrue(UrlRumourToVerify::where('ToConfirmed',true)->whereNotNull('VerifiedBy_id')->first()->Rumour->UrlOfficialConfirmed()!=null); 
    }

    public function testGetUrlOfficialDeniedNull(){
        $this->assertTrue(UrlRumourToVerify::where('ToConfirmed',false)->whereNull('VerifiedBy_id')->first()->Rumour->UrlOfficialDenied()==null);
    }
    public function testGetUrlOfficialConfirmedNull(){
        $this->assertTrue(UrlRumourToVerify::where('ToConfirmed',true)->whereNull('VerifiedBy_id')->first()->Rumour->UrlOfficialConfirmed()==null); 
    }

}
