<?php

use Illuminate\Database\Seeder;

use App\Location;
use App\Event;
use App\Range;

class RangeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $locations = Location::get();
        $events = Event::get();

        $totalLocations = count($locations) - 1;

        foreach ($events as $event) {
            $dic=[];
            for ($i = 0, $f = $faker->numberBetween(1, $totalLocations); $i < $f; $i++) {
                if ($faker->boolean() || $faker->boolean()) { //posso dos per tenir més probabilitats de tenir 
                    $range = new Range();
                    $range->event_id = $event->id;
                    do{
                        $idPos=$faker->numberBetween(0, $totalLocations);
                    }while(array_key_exists($idPos,$dic));
                    $dic[$idPos]=null;
                    $range->location_id = $locations[$idPos]->id;
                    $range->Range = $faker->randomFloat(2, 1, 10000);
                    $range->save();
                }
            }
        }
    }
}
