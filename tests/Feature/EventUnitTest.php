<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Event;
use App\Location;
use App\File;

class EventUnitTest extends TestCase
{
    public function testGetUser()
    {
        $this->assertTrue(Event::whereNotNull('user_id')->first()->User() != null);
    }
    public function testGetEventMaker()
    {
        $this->assertTrue(Event::get()->first()->EventMaker != null);
    }
    public function testGetLocation()
    {
        $this->assertTrue(Event::where('Location_id','<>',Location::DEFAULT_LOCATION)->first()->Location != null);
    }
    public function testGetLocationDefault()
    {
        $this->assertTrue(Event::where('Location_id',Location::DEFAULT_LOCATION)->first()->Location != null);
    }
    public function testImgPreview()
    {
        try {
            $correcte = false;
            $correcte = Event::where('ImgPreview_id','<>',File::IMG_PROFILE)->first()->ImgPreview != null;
        } finally {
            $this->assertTrue($correcte);
        }
    }
    public function testImgPreviewDefault()
    {
        try {
            $correcte = false;
            $event=Event::where('ImgPreview_id',File::IMG_PROFILE)->first();
            $correcte =  $event->ImgPreview!=null;
        } finally {
            $this->assertTrue($correcte);
        }
    }
    public function testImgEvent()
    {
        try {
            $correcte = false;
            $correcte = Event::where('ImgEvent_id','<>',File::IMG_PROFILE)->first()->ImgEvent != null;
        }finally {
            $this->assertTrue($correcte);
        }
    }
    public function testImgEventNull()
    {
        try {
            $correcte = false;
            $event=Event::where('ImgEvent_id',File::IMG_PROFILE)->first();
            $correcte = $event->ImgEvent!=null;
        }finally {
            $this->assertTrue($correcte);
        }
    }
    public function testGetUsers()
    {
        try {
            $correcte = false;
            count(Event::first()->Users);
            $correcte=true;
        } finally {
            $this->assertTrue($correcte);
        }
    }
    public function testGetLikes()
    {
        try {
            $correcte = false;
            count(Event::first()->Likes);
            $correcte=true;
        }finally {
            $this->assertTrue($correcte);
        }
    }
    public function testGetMessages()
    {
        try {
            $correcte = false;
            count(Event::first()->Messages);
            $correcte=true;
        } finally {
            $this->assertTrue($correcte);
        }
    }

    public function testGetAssistanceUserList()
    {
        try {
            $correcte = false;
            count(Event::first()->AssistanceUserList);
            $correcte=true;
        } finally {
            $this->assertTrue($correcte);
        }
    }
    public function testGetTags()
    {
        try {
            $correcte = false;
            count(Event::first()->Tags);
            $correcte=true;
        } finally {
            $this->assertTrue($correcte);
        }
    }
    public function testGetNotificationChangesList()
    {
        try {
            $correcte = false;
            count(Event::first()->NotificationChangesList);
            $correcte=true;
        }  finally {
            $this->assertTrue($correcte);
        }
    }
}
