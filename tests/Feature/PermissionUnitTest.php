<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Permission;

class PermissionUnitTest extends TestCase
{
    public function testGetUser(){
        $this->assertTrue(Permission::get()->first()->User()!=null);
    }
    public function testGetGrantedBy(){
        $this->assertTrue(Permission::get()->first()->GrantedBy()!=null);
    }
    public function testGetRole(){
        $this->assertTrue(Permission::get()->first()->Role()!=null);
    }
}
