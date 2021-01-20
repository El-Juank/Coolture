<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\UrlRumourToVerify;

class UrlRumourToVerifyUnitTest extends TestCase
{
    public function testGetUser() {
        $this->assertTrue(UrlRumourToVerify::get()->first()->User()!=null);
    }
    public function testGetRumour(){
        $this->assertTrue(UrlRumourToVerify::get()->first()->Rumour()!=null);
    }
    public function testGetVerifiedBy(){
        $this->assertTrue(UrlRumourToVerify::where('VerifiedBy_id','is not',null)->first()->VerifiedBy()!=null);
    }
}
