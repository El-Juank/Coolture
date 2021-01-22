<?php

use Illuminate\Database\Seeder;

use App\User;
use App\EventMaker;
use App\Rumour;

class RumourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {
        $faker = Faker\Factory::create();
        $users = User::all();
        $eventMakers = EventMaker::all();

        $totalEventMakers = count($eventMakers) - 1;
        $totalUsers = count($users) - 1;

        for ($i = 0; $i < 15; $i++) {
            $rumour = new Rumour();
            $rumour->event_maker_id = $eventMakers[$faker->numberBetween(0, $totalEventMakers)]->id;
            if ($faker->boolean() || $faker->boolean()) {
                $rumour->user_id = $users[$faker->numberBetween(0, $totalUsers)]->id;
            }
            $rumour->IsVisible = $faker->boolean();
            $rumour->OwnTrust = $faker->numberBetween(Rumour::MIN_TRUST, Rumour::MAX_TRUST);

            $title = $faker->sentence(5);
            $desc = $faker->sentence(50);

            $rumour->{'Title:ca'} = $title . '_CA';
            $rumour->{'Description:ca'} = $desc . '_CA';
            if ($faker->boolean()) {
                $rumour->{'Title:es'} = $title . '_ES';
                $rumour->{'Description:es'} = $desc . '_ES';
            }
            if ($faker->boolean()) {
                $rumour->{'Title:en'} = $title . '_EN';
                $rumour->{'Description:en'} = $desc . '_EN';
            }








            $rumour->save();
        }
    }
}
