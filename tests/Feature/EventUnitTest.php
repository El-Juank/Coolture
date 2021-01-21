<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Event;

class EventUnitTest extends TestCase
{
    public function testGetUser()
    {
        $this->assertTrue(Event::whereNotNull('user_id')->first()->User() != null);
    }
    public function testGetEventMaker()
    {
        $this->assertTrue(Event::get()->first()->EventMaker() != null);
    }
    public function testGetLocation()
    {
        $this->assertTrue(Event::whereNotNull('Location_id')->first()->Location() != null);
    }
    public function testGetLocationNull()
    {
        $this->assertTrue(Event::whereNull('Location_id')->first()->Location() == null);
    }
    public function testImgPreview()
    {
        try {
            $correcte = false;
            $correcte = Event::whereNotNull('ImgPreview_id')->first()->ImgPreview() != null;
        } finally {
            $this->assertTrue($correcte);
        }
    }
    public function testImgPreviewNull()
    {
        try {
            $correcte = false;
            $correcte = Event::whereNull('ImgPreview_id')->first()->ImgPreview() == null;
        } finally {
            $this->assertTrue($correcte);
        }
    }
    public function testImgEvent()
    {
        try {
            $correcte = false;
            $correcte = Event::whereNotNull('ImgEvent_id')->first()->ImgEvent() != null;
        }finally {
            $this->assertTrue($correcte);
        }
    }
    public function testImgEventNull()
    {
        try {
            $correcte = false;
            $correcte = Event::whereNull('ImgEvent_id')->first()->ImgEvent() == null;
        }finally {
            $this->assertTrue($correcte);
        }
    }
    public function testGetUsers()
    {
        try {
            $correcte = false;
            count(Event::get()->first()->Users());
            $correcte=true;
        } finally {
            $this->assertTrue($correcte);
        }
    }
    public function testGetLikes()
    {
        try {
            $correcte = false;
            count(Event::get()->first()->Likes());
            $correcte=true;
        }finally {
            $this->assertTrue($correcte);
        }
    }
    public function testGetMessages()
    {
        try {
            $correcte = false;
            count(Event::get()->first()->Messages());
            $correcte=true;
        } finally {
            $this->assertTrue($correcte);
        }
    }
    public function testGetAssistanceUserList()
    {
        try {
            $correcte = false;
            count(Event::get()->first()->AssistanceUserList());
            $correcte=true;
        } finally {
            $this->assertTrue($correcte);
        }
    }
    public function testGetTags()
    {
        try {
            $correcte = false;
            count(Event::get()->first()->Tags());
            $correcte=true;
        } finally {
            $this->assertTrue($correcte);
        }
    }
    public function testGetNotificationChangesList()
    {
        try {
            $correcte = false;
            count(Event::get()->first()->NotificationChangesList());
            $correcte=true;
        }  finally {
            $this->assertTrue($correcte);
        }
    }
}
