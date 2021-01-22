<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Event;
use App\EventMessage;

class EventMessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    const MAX = 5;
    public function run()
    {
        $faker = Faker\Factory::create();
        $users = User::get();
        $events = Event::get();

        $totalUsers = count($users) - 1;

        for($k=0,$kF=count($events);$k<$kF;$k++){
            $event=$events[$k];
            if ($faker->boolean() || $faker->boolean()) {
                for ($i = 0, $f = $faker->numberBetween(0, $totalUsers); $i <= $f; $i++) {
                    $user = $users[$faker->numberBetween(0, $totalUsers)];
                    for ($j = 0, $jF = $faker->numberBetween(0, self::MAX); $j < $jF; $j++) {
                        $eventMessage = new EventMessage();
                        $eventMessage->user_id = $user->id;
                        $eventMessage->event_id=$event->id;
                        $message = $faker->sentence(5);
                        $eventMessage->{'Message:ca'} = 'CA_' . $message . '_CA';
                        if ($faker->boolean()) {
                            $eventMessage->{'Message:es'} = 'ES_' . $message . '_ES';
                            if ($faker->boolean()) {
                                $eventMessage->{'Message:en'} = 'EN_' . $message . '_EN';
                            }
                        }
                        $eventMessage->save();
                    }
                }
            }
        }
    }
}
