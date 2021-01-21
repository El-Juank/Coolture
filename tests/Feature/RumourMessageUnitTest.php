<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\RumourMessage;

class RumourMessageUnitTest extends TestCase
{
    public function testGetUser(){
        try{
            $correcte=false;
            $correcte=RumourMessage::get()->first()->User()!=null;

        }finally{
            $this->assertTrue($correcte);

        }
    }
    public function testIsComunityManagedTrue(){
        try{
            $correcte=false;
            $correcte=RumourMessage::whereNull('user_id')->first()->IsComunityManaged();

        }finally{
            $this->assertTrue($correcte);

        }
    }
    public function testIsComunityManagedFalse(){
        try{
            $correcte=false;
            $correcte=RumourMessage::whereNotNull('user_id')->first()->IsComunityManaged();

        }finally{
            $this->assertFalse($correcte);

        }
    }
    public function testGetRumour(){
        try{
            $correcte=false;
            $correcte=RumourMessage::get()->first()->Rumour()!=null;

        }finally{
            $this->assertTrue($correcte);

        }
    }
}
