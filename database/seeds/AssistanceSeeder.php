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
        for ($i = 0, $iF = count($events), $jF = count($users); $i < $iF; $i++) {
            for ($j = 0; $j < $jF; $j++) {

                $assistance = new Assistance();
                $assistance->user_id = $users[$jF]->id;
                $assistance->Event_id = $events[$iF]->id;
                $assistance->WantToAssist = $faker->boolean();
                $assistance->Assisted = $faker->boolean();
                if ($assistance->WantToAssist && $assistance->Assisted) {
                    $assistance->save();
                }
            }
        }
    }
}
