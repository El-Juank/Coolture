<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\EventMaker;

class EventMakerUnitTest extends TestCase
{
    public function testGetUser(){
        $this->assertTrue(EventMaker::get()->first()->User()!=null);
    }
    public function testComunityManageTrue(){
        $this->assertTrue(EventMaker::whereNull('user_id')->first()->ComunityManage());
    }
    public function testComunityManageFalse(){
        $this->assertFalse(EventMaker::whereNotNull('user_id')->first()->ComunityManage());
    }
    public function testImgCover(){
        try{
           
            $correcte= EventMaker::whereNotNull('ImgCover_id')->first()->ImgCover()!=null;

        }catch(object $e){
            $correcte=false;

        }finally{
            $this->assertTrue($correcte);

        }
    }
    public function testImgProfile(){
        try{
           
            $correcte= EventMaker::whereNotNull('ImgProfile_id')->first()->ImgProfile()!=null;

        }catch(object $e){
            $correcte=false;

        }finally{
            $this->assertTrue($correcte);

        }
    }
    public function testGetUsers(){
        try{
            $correcte=false;
            $total=count(EventMaker::get()->first()->Users());
            $correcte=true;

        }finally{
            $this->assertTrue($correcte);

        }
    }
    public function testGetEvents(){
        try{
            $correcte=false;
            $total=count(EventMaker::get()->first()->Events());
            $correcte=true;

        }finally{
            $this->assertTrue($correcte);

        }
    }
    public function testGetRumours(){
        try{
            $correcte=false;
            $total=count(EventMaker::get()->first()->Rumours());
            $correcte=true;

        }finally{
            $this->assertTrue($correcte);

        }
    }
    public function testGetRanges(){
        try{
            $correcte=false;
            $total=count(EventMaker::get()->first()->Ranges());
            $correcte=true;

        }finally{
            $this->assertTrue($correcte);

        }
    }
    public function testSubcategories(){
        try{
            $correcte=false;
            $total=count(EventMaker::get()->first()->Subcategories());
            $correcte=true;

        }finally{
            $this->assertTrue($correcte);

        }
    }
    public function testGetNotificationChangesList(){
        try{
            $correcte=false;
            $total=count(EventMaker::get()->first()->NotificationChangesList());
            $correcte=true;

        }finally{
            $this->assertTrue($correcte);

        }
    }
    public function testGetLocations(){
        try{
            $correcte=false;
            $total=count(EventMaker::get()->first()->Locations());
            $correcte=true;

        }finally{
            $this->assertTrue($correcte);

        }
    }
    public function testGetEventTags(){
        try{
            $correcte=false;
            $total=count(EventMaker::get()->first()->EventTags());
            $correcte=true;

        }finally{
            $this->assertTrue($correcte);

        }
    }
    public function testGetRumourTags(){
        try{
            $correcte=false;
            $total=count(EventMaker::get()->first()->RumourTags());
            $correcte=true;

        }finally{
            $this->assertTrue($correcte);

        }
    }
    public function testGetTags(){
        try{
            $correcte=false;
            $total=count(EventMaker::get()->first()->Tags());
            $correcte=true;

        }finally{
            $this->assertTrue($correcte);

        }
    }
    //falta proba de contingut
}
