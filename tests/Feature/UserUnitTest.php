<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\User;
use App\RumourMessage;
use App\Permission;
use App\NotificationChangeEvent;
use App\NotificationChangeRumour;
use App\NotificationChangeEventMaker;

class UserUnitTest extends TestCase
{
    public function testGetCountry()
    {
        $this->assertTrue(User::whereNotNull('Country_id')->first()->Country != null);
    }
    public function testGetDefaultLocation()
    {
        $this->assertTrue(User::whereNotNull('DefaultLocation_id')->first()->DefaultLocation != null);
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
        $this->assertTrue(User::whereNotNull('UserVerified_id')->first()->VerifiedBy != null);
    }
    public function testGetAssitanceEventList()
    {
        try {
            $correcte=false;
            $correcte = count(User::find(2)->AssitanceEventList) != null;
        } finally {
            $this->assertTrue($correcte);
        }
    }
    public function testGetEvents()
    {
        try {
            $correcte=false;
            $correcte = count(User::find(2)->Events) != null;
        }finally {
            $this->assertTrue($correcte);
        }
    }
    public function testGetUrlRumoursToVerify()
    {
        try {
            $correcte=false;
            $correcte = count(User::find(2)->UrlRumoursToVerify) != null;
        } finally {
            $this->assertTrue($correcte);
        }
    }
    public function testGetUrlPendentRumoursToVerify()
    {
        try {
            $correcte=false;
            $correcte = count(User::find(2)->UrlRumoursPendentToVerify()) != null;
        }finally {
            $this->assertTrue($correcte);
        }
    }
    public function testGetMessagesFrom()
    {
        try {
            $correcte=false;
            $correcte = count(User::find(2)->MessagesFrom) != null;
        } finally {
            $this->assertTrue($correcte);
        }
    }
    public function testGetMessagesTo()
    {
        try {
            $correcte=false;
            $correcte = count(User::find(2)->MessagesTo) != null;
        } finally {
            $this->assertTrue($correcte);
        }
    }
    public function testGetRumourMessages()
    {
        try {
            $correcte=false;
            $correcte = count(RumourMessage::find(2)->User->RumourMessages) != null;
        }finally {
            $this->assertTrue($correcte);
        }
    }
    public function testGetEventMessages()
    {
        try {
            $correcte=false;
            $correcte = count(User::find(2)->EventMessages) != null;
        }finally {
            $this->assertTrue($correcte);
        }
    }
    public function testGetLikeEvents()
    {
        try {
            $correcte=false;
            $correcte = count(User::find(2)->LikeEvents) != null;
        }finally {
            $this->assertTrue($correcte);
        }
    }
    public function testGetLikeEventMessages()
    {
        try {
            $correcte=false;
            $correcte = count(User::find(2)->LikeEventMessages) != null;
        }finally {
            $this->assertTrue($correcte);
        }
    }
    public function testGetLikeRumours()
    {
        try {
            $correcte=false;
            $correcte = count(User::find(2)->LikeRumours) != null;
        }finally {
            $this->assertTrue($correcte);
        }
    }
    public function testGetLikeRumourMessages()
    {
        try {
            $correcte=false;
            $correcte = count(User::find(2)->LikeRumourMessages) != null;
        } finally {
            $this->assertTrue($correcte);
        }
    }
    public function testGetRanges()
    {
        try {
            $correcte=false;
            $correcte = count(User::find(2)->Ranges) != null;
        }finally {
            $this->assertTrue($correcte);
        }
    }
    public function testGetEventMakers()
    {
        try {
            $correcte=false;
            $correcte = count(User::find(2)->EventMakers) != null;
        }finally {
            $this->assertTrue($correcte);
        }
    }
    public function testGetPermissions()
    {
        try {
            $correcte=false;
            $correcte = count(User::find(2)->Permissions)!= null;
        } finally {
            $this->assertTrue($correcte);
        }
    }
    public function testGetPermissionGranted()
    {
        try {
            $correcte=false;
            $correcte = count(Permission::whereNotNull('GrantedBy_id')->first()->GrantedBy->PermissionsGranted) != null;
        }finally {
            $this->assertTrue($correcte);
        }
    }
    public function testGetRoles()
    {
        try {
            $correcte=false;
            $correcte = count(User::find(2)->Roles) != null;
        }finally {
            $this->assertTrue($correcte);
        }
    }
    public function testGetNotificationChangesEvent()
    {
        try {
            $correcte=false;
            $correcte = count(NotificationChangeEvent::find(3)->User->NotificationChangesEvent(false)) != null;
        }finally {
            $this->assertTrue($correcte);
        }
    }
    public function testGetNotificationChangesEventMaker()
    {
        try {
            $correcte=false;
            $correcte = count(NotificationChangeEventMaker::find(2)->User->NotificationChangesEventMaker(false)) != null;
        } finally {
            $this->assertTrue($correcte);
        }
    }
    public function testGetNotificationChangesRumour()
    {
        try {
            $correcte=false;
            $correcte = count(NotificationChangeRumour::find(2)->User->NotificationChangesRumour(false)) != null;
        }finally {
            $this->assertTrue($correcte);
        }
    }
}
