<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Rumour;
use App\RumourMessage;

class RumourMessageSeeder extends Seeder
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
        $rumours = Rumour::get();

        $totalUsers = count($users) - 1;
        for ($i = 0, $f = count($rumours); $i < $f; $i++) {
            $rumour = $rumours[$i];
            if ($faker->boolean() || $faker->boolean()) {
                for ($i = 0, $f = $faker->numberBetween(0, $totalUsers); $i <= $f; $i++) {

                    $user =$users[$faker->numberBetween(0, $totalUsers)];

                    for ($j = 0, $jF = $faker->numberBetween(0, self::MAX); $j < $jF; $j++) {
                        $rumourMessage = new RumourMessage();
                        $rumourMessage->user_id = $user->id;
                        $rumourMessage->Rumour_id = $rumour->id;
                        $message = $faker->sentence(10);
                        $rumourMessage->{'Message:ca'} = 'CA_' . $message . '_CA';
                        if ($faker->boolean()) {
                            $rumourMessage->{'Message:es'} = 'ES_' . $message . '_ES';
                            if ($faker->boolean()) {
                                $rumourMessage->{'Message:en'} = 'EN_' . $message . '_EN';
                            }
                        }
                        $rumourMessage->save();
                    }
                }
            }
        }
    }
}
