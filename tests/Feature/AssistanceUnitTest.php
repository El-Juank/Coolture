<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Assistance;
use App\User;
use App\Event;

class AssistanceUnitTest extends TestCase
{

    public function testGetUser()
    {
        try {

            $correcte = Assistance::get()->first()->User() != null;
        } catch (object $e) {
            $correcte = false;
        } finally {
            $this->assertTrue($correcte);
        }
    }

    public function testGetEvent()
    {
        try {

            $correcte = Assistance::all()->first()->Event() != null;
        } catch (object $e) {
            $correcte = false;
        } finally {
            $this->assertTrue($correcte);
        }
    }
    public function testNoDeleteWithWant()
    {
        $assistance = new Assistance();
        $assistance->user_id = User::all()->first()->id;
        $assistance->Event_id = Event::all()->first()->id;
        $assistance->WantToAssist = true;
        $this->assertFalse($assistance->Delete());
    }
    public function testNoDeleteWithAssisted()
    {
        $assistance = new Assistance();
        $assistance->user_id = User::all()->first()->id;
        $assistance->Event_id = Event::all()->first()->id;
        $assistance->Assisted = true;
        $this->assertFalse($assistance->Delete());
    }
    public function testNoDeleteWithBoth()
    {
        $assistance = new Assistance();
        $assistance->user_id = User::all()->first()->id;
        $assistance->Event_id = Event::all()->first()->id;
        $assistance->WantToAssist = true;
        $assistance->Assisted = true;
        $this->assertFalse($assistance->Delete());
    }
    public function testDeleteFalseAssisted()
    {
        $assistance = Assistance::where('WantToAssist', true)->where('Assisted', false)->first();
        $this->assertFalse($assistance->Delete());
    }
    public function testDeleteFalseWantToAssist()
    {
        $assistance = Assistance::where('WantToAssist', false)->where('Assisted', true)->first();
        $this->assertFalse($assistance->Delete());
    }
    public function testDeleteTrue()
    {
        $assistance = Assistance::where('WantToAssist', false)->where('Assisted', false)->first();
        $this->assertTrue($assistance->Delete());
    }
 
}
