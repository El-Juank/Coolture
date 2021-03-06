<?php

use Illuminate\Database\Seeder;

use App\User;
use App\EventMaker;
use App\Event;
use App\Location;
use App\File;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    const IMG_EVENT_ID = 1;
    const IMG_PREVIEW_ID = 2;
    public function run()
    {
        $faker = Faker\Factory::create();
        $users = User::all();
        $eventMakers = EventMaker::all();
        $locations = Location::all();
        $imgsEvents = File::where('Path_id', self::IMG_EVENT_ID)->get();
        $imgsPreview = File::where('Path_id', self::IMG_PREVIEW_ID)->get();

        $totalLocations = count($locations) - 1; //s'ha de restar perque el numberBetween inclu el màxim, per tant sortiria de la taula i donaria error
        $totalImgsEvent = count($imgsEvents) - 1;
        $totalImgsPreview = count($imgsPreview) - 1;
        $totalEventMakers = count($eventMakers) - 1;
        $totalUsers = count($users) - 1;

        for ($i = 0; $i < 15; $i++) {
            $event = new Event();
            $event->event_maker_id = $eventMakers[$faker->numberBetween(0, $totalEventMakers)]->id;
            if ($faker->boolean() || $faker->boolean()) {
                $event->user_id = $users[$faker->numberBetween(0, $totalUsers)]->id;
            }
            if ($faker->boolean() || $faker->boolean()) {
                $event->location_id = $locations[$faker->numberBetween(0, $totalLocations)]->id;
            }
            if ($faker->boolean() || $faker->boolean()) {
                $event->ImgEvent_id = $imgsEvents[$faker->numberBetween(0, $totalImgsEvent)]->id;
            }
            if ($faker->boolean() || $faker->boolean()) {
                $event->ImgPreview_id = $imgsPreview[$faker->numberBetween(0, $totalImgsPreview)]->id;
            }

            $event->Published = $faker->boolean();
            $event->InitDate = $faker->date();
            $event->Duration = $faker->datetime();

            $title = $faker->sentence(5);
            $desc = $faker->sentence(50);

            $event->{'Title:ca'} = $title . '_CA';
            $event->{'Description:ca'} = $desc . '_CA';

            if ($faker->boolean() || $faker->boolean()) {
                $event->{'Title:es'} = $title . '_ES';
                $event->{'Description:es'} = $desc . '_ES';
            }
            if ($faker->boolean() || $faker->boolean()) {
                $event->{'Title:en'} = $title . '_EN';
                $event->{'Description:en'} = $desc . '_EN';
            }





            $event->save();
        }
    }
}
