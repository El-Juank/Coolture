<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\EventMaker;
use App\User;

class EventMakerUnitTest extends TestCase
{
    public function testGetUser(){
        $this->assertTrue(EventMaker::get()->first()->User()!=null);
    }
    public function testComunityManageTrue(){
        $this->assertTrue(EventMaker::where('user_id',User::COMUNITY_ID)->first()->ComunityManage());
    }
    public function testComunityManageFalse(){
        $this->assertFalse(EventMaker::where('user_id','<>',User::COMUNITY_ID)->first()->ComunityManage());
    }
    public function testImgCover(){
        try{
            $correcte=false;
            $correcte= EventMaker::first()->ImgCover!=null;

        }finally{
            $this->assertTrue($correcte);

        }
    }
    public function testImgProfile(){
        try{
            $correcte=false;
            $correcte= EventMaker::first()->ImgProfile!=null;

        }finally{
            $this->assertTrue($correcte);
        }
    }
    public function testGetFollowers(){
        try{
            $correcte=false;
            count(EventMaker::first()->Followers);
            $correcte=true;

        }finally{
            $this->assertTrue($correcte);

        }
    }
    public function testGetEvents(){
        try{
            $correcte=false;
            $total=count(EventMaker::first()->Events);
            $correcte=true;

        }finally{
            $this->assertTrue($correcte);

        }
    }
    public function testGetRumours(){
        try{
            $correcte=false;
            count(EventMaker::first()->Rumours);
            $correcte=true;

        }finally{
            $this->assertTrue($correcte);

        }
    }
    public function testGetRanges(){
        try{
            $correcte=false;
            count(EventMaker::first()->Ranges);
            $correcte=true;

        }finally{
            $this->assertTrue($correcte);

        }
    }
    public function testSubcategories(){
        try{
            $correcte=false;
            count(EventMaker::first()->Subcategories);
            $correcte=true;

        }finally{
            $this->assertTrue($correcte);

        }
    }
    public function testGetNotificationChangesList(){
        try{
            $correcte=false;
            count(EventMaker::first()->NotificationChangesList);
            $correcte=true;

        }finally{
            $this->assertTrue($correcte);

        }
    }
    public function testGetLocations(){
        try{
            $correcte=false;
            count(EventMaker::first()->Locations);
            $correcte=true;

        }finally{
            $this->assertTrue($correcte);

        }
    }
    public function testGetEventTags(){
        try{
            $correcte=false;
            count(EventMaker::first()->EventTags());
            $correcte=true;

        }finally{
            $this->assertTrue($correcte);

        }
    }
    public function testGetRumourTags(){
        try{
            $correcte=false;
            count(EventMaker::first()->RumourTags());
            $correcte=true;

        }finally{
            $this->assertTrue($correcte);

        }
    }
    public function testGetTags(){
        try{
            $correcte=false;
            count(EventMaker::first()->Tags());
            $correcte=true;

        }finally{
            $this->assertTrue($correcte);

        }
    }

}
