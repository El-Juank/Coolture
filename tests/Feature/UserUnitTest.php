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
        $this->assertTrue(User::where('Country_id', 'is not', null)->first()->Country() != null);
    }
    public function testGetDefaultLocation()
    {
        $this->assertTrue(User::where('Default_Location_id', 'is not', null)->first()->DefaultLocation() != null);
    }
    public function testGetImgProfile()
    {
        $this->assertTrue(User::where('ImgProfile_id', 'is not', null)->first()->ImgProfile() != null);
    }
    public function testGetImgCover()
    {
        $this->assertTrue(User::where('ImgCover_id', 'is not', null)->first()->ImgCover() != null);
    }
    public function testGetVerifiedBy()
    {
        $this->assertTrue(User::where('VerifiedBy_id', 'is not', null)->first()->VerifiedBy() != null);
    }
    public function testGetAssistenceEventList()
    {
        try {
            $correcte = count(User::get()->first()->AssistanceEventList()) != null;
        } catch (object $e) {
            $correcte = false;
        } finally {
            $this->assertTrue($correcte);
        }
    }
    public function testGetEvents()
    {
        try {
            $correcte = count(User::get()->first()->Events()) != null;
        } catch (object $e) {
            $correcte = false;
        } finally {
            $this->assertTrue($correcte);
        }
    }
    public function testGetUrlRumoursToVerify()
    {
        try {
            $correcte = count(User::get()->first()->UrlRumoursToVerify()) != null;
        } catch (object $e) {
            $correcte = false;
        } finally {
            $this->assertTrue($correcte);
        }
    }
    public function testGetUrlPendentRumoursToVerify()
    {
        try {
            $correcte = count(User::get()->first()->UrlRumoursPendentToVerify()) != null;
        } catch (object $e) {
            $correcte = false;
        } finally {
            $this->assertTrue($correcte);
        }
    }
    public function testGetMessages()
    {
        try {
            $correcte = count(User::get()->first()->Messages()) != null;
        } catch (object $e) {
            $correcte = false;
        } finally {
            $this->assertTrue($correcte);
        }
    }
    public function testGetRumourMessages()
    {
        try {
            $correcte = count(User::get()->first()->RumourMessages()) != null;
        } catch (object $e) {
            $correcte = false;
        } finally {
            $this->assertTrue($correcte);
        }
    }
    public function testGetEventMessages()
    {
        try {
            $correcte = count(User::get()->first()->EventMessages()) != null;
        } catch (object $e) {
            $correcte = false;
        } finally {
            $this->assertTrue($correcte);
        }
    }
    public function testGetLikeEvents()
    {
        try {
            $correcte = count(User::get()->first()->LikeEvents()) != null;
        } catch (object $e) {
            $correcte = false;
        } finally {
            $this->assertTrue($correcte);
        }
    }
    public function testGetLikeEventMessages()
    {
        try {
            $correcte = count(User::get()->first()->LikeEventMessages()) != null;
        } catch (object $e) {
            $correcte = false;
        } finally {
            $this->assertTrue($correcte);
        }
    }
    public function testGetLikeRumours()
    {
        try {
            $correcte = count(User::get()->first()->LikeRumours()) != null;
        } catch (object $e) {
            $correcte = false;
        } finally {
            $this->assertTrue($correcte);
        }
    }
    public function testGetLikeRumourMessages()
    {
        try {
            $correcte = count(User::get()->first()->LikeRumourMessages()) != null;
        } catch (object $e) {
            $correcte = false;
        } finally {
            $this->assertTrue($correcte);
        }
    }
    public function testGetRanges()
    {
        try {
            $correcte = count(User::get()->first()->Ranges()) != null;
        } catch (object $e) {
            $correcte = false;
        } finally {
            $this->assertTrue($correcte);
        }
    }
    public function testGetEventMakers()
    {
        try {
            $correcte = count(User::get()->first()->EventMakers()) != null;
        } catch (object $e) {
            $correcte = false;
        } finally {
            $this->assertTrue($correcte);
        }
    }
    public function testGetPermissions()
    {
        try {
            $correcte = count(User::get()->first()->Permissions()) != null;
        } catch (object $e) {
            $correcte = false;
        } finally {
            $this->assertTrue($correcte);
        }
    }
    public function testGetPermissionGranted()
    {
        try {
            $correcte = count(User::get()->first()->PermissionGranted()) != null;
        } catch (object $e) {
            $correcte = false;
        } finally {
            $this->assertTrue($correcte);
        }
    }
    public function testGetRoles()
    {
        try {
            $correcte = count(User::get()->first()->Roles()) != null;
        } catch (object $e) {
            $correcte = false;
        } finally {
            $this->assertTrue($correcte);
        }
    }
    public function testGetNotificationChangesEvent()
    {
        try {
            $correcte = count(User::get()->first()->NotificationChangesEvent()) != null;
        } catch (object $e) {
            $correcte = false;
        } finally {
            $this->assertTrue($correcte);
        }
    }
    public function testGetNotificationChangesEventMaker()
    {
        try {
            $correcte = count(User::get()->first()->NotificationChangesEventMaker()) != null;
        } catch (object $e) {
            $correcte = false;
        } finally {
            $this->assertTrue($correcte);
        }
    }
    public function testGetNotificationChangesRumour()
    {
        try {
            $correcte = count(User::get()->first()->NotificationChangesRumour()) != null;
        } catch (object $e) {
            $correcte = false;
        } finally {
            $this->assertTrue($correcte);
        }
    }
}
