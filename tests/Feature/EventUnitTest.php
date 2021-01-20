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
        $this->assertTrue(Event::where('user_id', 'is not', null)->first()->User() != null);
    }
    public function testGetEventMaker()
    {
        $this->assertTrue(Event::get()->first()->EventMaker() != null);
    }
    public function testGetLocation()
    {
        $this->assertTrue(Event::where('Location_id', 'is not', null)->first()->Location() != null);
    }
    public function testGetLocationNull()
    {
        $this->assertTrue(Event::where('Location_id', 'is', null)->first()->Location() == null);
    }
    public function testImgPreview()
    {
        try {

            $correcte = Event::where('ImgPreview_id', 'is not', null)->first()->ImgPreview() != null;
        } catch (object $e) {
            $correcte = false;
        } finally {
            $this->assertTrue($correcte);
        }
    }
    public function testImgPreviewNull()
    {
        try {

            $correcte = Event::where('ImgPreview_id', 'is', null)->first()->ImgPreview() == null;
        } catch (object $e) {
            $correcte = false;
        } finally {
            $this->assertTrue($correcte);
        }
    }
    public function testImgEvent()
    {
        try {

            $correcte = Event::where('ImgEvent_id', 'is not', null)->first()->ImgEvent() != null;
        } catch (object $e) {
            $correcte = false;
        } finally {
            $this->assertTrue($correcte);
        }
    }
    public function testImgEventNull()
    {
        try {

            $correcte = Event::where('ImgEvent_id', 'is', null)->first()->ImgEvent() == null;
        } catch (object $e) {
            $correcte = false;
        } finally {
            $this->assertTrue($correcte);
        }
    }
    public function testGetUsers()
    {
        try {

            $total = count(Event::get()->first()->Users());
            $correcte=true;
        } catch (object $e) {
            $correcte = false;
        } finally {
            $this->assertTrue($correcte);
        }
    }
    public function testGetLikes()
    {
        try {

            $total = count(Event::get()->first()->Likes());
            $correcte=true;
        } catch (object $e) {
            $correcte = false;
        } finally {
            $this->assertTrue($correcte);
        }
    }
    public function testGetMessages()
    {
        try {

            $total = count(Event::get()->first()->Messages());
            $correcte=true;
        } catch (object $e) {
            $correcte = false;
        } finally {
            $this->assertTrue($correcte);
        }
    }
    public function testGetAssistanceUserList()
    {
        try {

            $total = count(Event::get()->first()->AssistanceUserList());
            $correcte=true;
        } catch (object $e) {
            $correcte = false;
        } finally {
            $this->assertTrue($correcte);
        }
    }
    public function testGetTags()
    {
        try {

            $total = count(Event::get()->first()->Tags());
            $correcte=true;
        } catch (object $e) {
            $correcte = false;
        } finally {
            $this->assertTrue($correcte);
        }
    }
    public function testGetNotificationChangesList()
    {
        try {

            $total = count(Event::get()->first()->NotificationChangesList());
            $correcte=true;
        } catch (object $e) {
            $correcte = false;
        } finally {
            $this->assertTrue($correcte);
        }
    }
}
