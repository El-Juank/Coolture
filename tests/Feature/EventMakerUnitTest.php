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
        $this->assertTrue(EventMaker::where('user_id','is',null)->first()->ComunityManage());
    }
    public function testComunityManageFalse(){
        $this->assertFalse(EventMaker::where('user_id','is not',null)->first()->ComunityManage());
    }
    public function testImgCover(){
        try{
           
            $correcte= EventMaker::where('ImgCover_id','is not',null)->first()->ImgCover()!=null;

        }catch(object $e){
            $correcte=false;

        }finally{
            $this->assertTrue($correcte);

        }
    }
    public function testImgProfile(){
        try{
           
            $correcte= EventMaker::where('ImgProfile_id','is not',null)->first()->ImgProfile()!=null;

        }catch(object $e){
            $correcte=false;

        }finally{
            $this->assertTrue($correcte);

        }
    }
    public function testGetUsers(){
        try{
            $total=count(EventMaker::get()->first()->Users());
            $correcte=true;

        }catch(object $e){
            $correcte=false;

        }finally{
            $this->assertTrue($correcte);

        }
    }
    public function testGetEvents(){
        try{
            $total=count(EventMaker::get()->first()->Events());
            $correcte=true;

        }catch(object $e){
            $correcte=false;

        }finally{
            $this->assertTrue($correcte);

        }
    }
    public function testGetRumours(){
        try{
            $total=count(EventMaker::get()->first()->Rumours());
            $correcte=true;

        }catch(object $e){
            $correcte=false;

        }finally{
            $this->assertTrue($correcte);

        }
    }
    public function testGetRanges(){
        try{
            $total=count(EventMaker::get()->first()->Ranges());
            $correcte=true;

        }catch(object $e){
            $correcte=false;

        }finally{
            $this->assertTrue($correcte);

        }
    }
    public function testSubcategories(){
        try{
            $total=count(EventMaker::get()->first()->Subcategories());
            $correcte=true;

        }catch(object $e){
            $correcte=false;

        }finally{
            $this->assertTrue($correcte);

        }
    }
    public function testGetNotificationChangesList(){
        try{
            $total=count(EventMaker::get()->first()->NotificationChangesList());
            $correcte=true;

        }catch(object $e){
            $correcte=false;

        }finally{
            $this->assertTrue($correcte);

        }
    }
    public function testGetLocations(){
        try{
            $total=count(EventMaker::get()->first()->Locations());
            $correcte=true;

        }catch(object $e){
            $correcte=false;

        }finally{
            $this->assertTrue($correcte);

        }
    }
    public function testGetEventTags(){
        try{
            $total=count(EventMaker::get()->first()->EventTags());
            $correcte=true;

        }catch(object $e){
            $correcte=false;

        }finally{
            $this->assertTrue($correcte);

        }
    }
    public function testGetRumourTags(){
        try{
            $total=count(EventMaker::get()->first()->RumourTags());
            $correcte=true;

        }catch(object $e){
            $correcte=false;

        }finally{
            $this->assertTrue($correcte);

        }
    }
    public function testGetTags(){
        try{
            $total=count(EventMaker::get()->first()->Tags());
            $correcte=true;

        }catch(object $e){
            $correcte=false;

        }finally{
            $this->assertTrue($correcte);

        }
    }
    //falta proba de contingut
}
