<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Preference;

class PreferenceUnitTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetConfig()
    {
        $config=Preference::get()->first();
       $this->assertTrue($config==null||$config->Config!=null);
    }
}
