<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Event;
use App\Assistance;

class AssistanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $users = User::get();
        $events = Event::get();
        for ($e = 0, $eF = count($events), $uF = count($users); $e < $eF; $e++) {
            for ($u = $uF / 10; $u < $uF; $u++) {

                $assistance = new Assistance();
                $assistance->user_id = $users[$u]->id;
                $assistance->Event_id = $events[$e]->id;
                $assistance->WantToAssist = $faker->boolean();
                $assistance->Assisted = $faker->boolean();

                $assistance->save();
            }
        }
    }
}
