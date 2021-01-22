<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\User;

class UserUnitTest extends TestCase
{
    public function testGetCountry()
    {
        $this->assertTrue(User::whereNotNull('Country_id')->first()->Country != null);
    }
    public function testGetDefaultLocation()
    {
        $this->assertTrue(User::whereNotNull('Default_Location_id')->first()->DefaultLocation != null);
    }
    public function testGetImgProfile()
    {
        $this->assertTrue(User::whereNotNull('ImgProfile_id')->first()->ImgProfile() != null);
    }
    public function testGetImgCover()
    {
        $this->assertTrue(User::whereNotNull('ImgCover_id')->first()->ImgCover() != null);
    }
    public function testGetVerifiedBy()
    {
        $this->assertTrue(User::whereNotNull('VerifiedBy_id')->first()->VerifiedBy() != null);
    }
    public function testGetAssistenceEventList()
    {
        try {
            $correcte=false;
            $correcte = count(User::get()->first()->AssistanceEventList) != null;
        } finally {
            $this->assertTrue($correcte);
        }
    }
    public function testGetEvents()
    {
        try {
            $correcte=false;
            $correcte = count(User::get()->first()->Events) != null;
        }finally {
            $this->assertTrue($correcte);
        }
    }
    public function testGetUrlRumoursToVerify()
    {
        try {
            $correcte=false;
            $correcte = count(User::get()->first()->UrlRumoursToVerify) != null;
        } finally {
            $this->assertTrue($correcte);
        }
    }
    public function testGetUrlPendentRumoursToVerify()
    {
        try {
            $correcte=false;
            $correcte = count(User::get()->first()->UrlRumoursPendentToVerify()) != null;
        }finally {
            $this->assertTrue($correcte);
        }
    }
    public function testGetMessages()
    {
        try {
            $correcte=false;
            $correcte = count(User::get()->first()->Messages) != null;
        } finally {
            $this->assertTrue($correcte);
        }
    }
    public function testGetRumourMessages()
    {
        try {
            $correcte=false;
            $correcte = count(User::get()->first()->RumourMessages) != null;
        }finally {
            $this->assertTrue($correcte);
        }
    }
    public function testGetEventMessages()
    {
        try {
            $correcte=false;
            $correcte = count(User::get()->first()->EventMessages) != null;
        }finally {
            $this->assertTrue($correcte);
        }
    }
    public function testGetLikeEvents()
    {
        try {
            $correcte=false;
            $correcte = count(User::get()->first()->LikeEvents) != null;
        }finally {
            $this->assertTrue($correcte);
        }
    }
    public function testGetLikeEventMessages()
    {
        try {
            $correcte=false;
            $correcte = count(User::get()->first()->LikeEventMessages) != null;
        }finally {
            $this->assertTrue($correcte);
        }
    }
    public function testGetLikeRumours()
    {
        try {
            $correcte=false;
            $correcte = count(User::get()->first()->LikeRumours) != null;
        }finally {
            $this->assertTrue($correcte);
        }
    }
    public function testGetLikeRumourMessages()
    {
        try {
            $correcte=false;
            $correcte = count(User::get()->first()->LikeRumourMessages) != null;
        } finally {
            $this->assertTrue($correcte);
        }
    }
    public function testGetRanges()
    {
        try {
            $correcte=false;
            $correcte = count(User::get()->first()->Ranges) != null;
        }finally {
            $this->assertTrue($correcte);
        }
    }
    public function testGetEventMakers()
    {
        try {
            $correcte=false;
            $correcte = count(User::get()->first()->EventMakers) != null;
        }finally {
            $this->assertTrue($correcte);
        }
    }
    public function testGetPermissions()
    {
        try {
            $correcte=false;
            $correcte = count(User::get()->first()->Permissions)!= null;
        } finally {
            $this->assertTrue($correcte);
        }
    }
    public function testGetPermissionGranted()
    {
        try {
            $correcte=false;
            $correcte = count(User::get()->first()->PermissionsGranted) != null;
        }finally {
            $this->assertTrue($correcte);
        }
    }
    public function testGetRoles()
    {
        try {
            $correcte=false;
            $correcte = count(User::get()->first()->Roles) != null;
        }finally {
            $this->assertTrue($correcte);
        }
    }
    public function testGetNotificationChangesEvent()
    {
        try {
            $correcte=false;
            $correcte = count(User::get()->first()->NotificationChangesEvent()) != null;
        }finally {
            $this->assertTrue($correcte);
        }
    }
    public function testGetNotificationChangesEventMaker()
    {
        try {
            $correcte=false;
            $correcte = count(User::get()->first()->NotificationChangesEventMaker()) != null;
        } finally {
            $this->assertTrue($correcte);
        }
    }
    public function testGetNotificationChangesRumour()
    {
        try {
            $correcte=false;
            $correcte = count(User::get()->first()->NotificationChangesRumour()) != null;
        }finally {
            $this->assertTrue($correcte);
        }
    }
}
