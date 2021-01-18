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
        $faker=Faker\Factory::create();
        $locations=Location::get();
        $events=Event::get();

        $totalLocations=count($locations);

        foreach($events as $event){
            $range=new Range();
            $range->Event_id=$event->id;
            $range->Location_id=$locations[$faker->numberBetween(0, $totalLocations)]->id;
            $range->Range=$faker->randomFloat(2,1,1000000);
            $range->save();
        }
        
    }
}
