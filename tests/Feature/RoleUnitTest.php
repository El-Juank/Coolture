<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Role;

class RoleUnitTest extends TestCase
{
    public function testGetName()
    {
       $this->assertTrue(Role::get()->first()->Name!=null);
    }
}
