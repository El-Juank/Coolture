<?php

use App\UrlRumourToVerify;
use Illuminate\Database\Seeder;

use App\Rumour;
use App\User;

class UrlRumourToVerifySeeder extends Seeder
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
        $rumours = Rumour::get();
        $users = User::get();

        $totalUsers = count($users) - 1;
        foreach ($rumours as $rumour) {
            if ($faker->boolean()) {
                for ($i = 0; $i <= $totalUsers && $i < self::MAX; $i++) {
                    if ($faker->boolean()) {
                        $urlRumour = new UrlRumourToVerify();
                        $urlRumour->rumour_id = $rumour->id;
                        if ($faker->boolean() || $faker->boolean()) {
                            $urlRumour->user_id = $users[$faker->numberBetween(0, $totalUsers)]->id;
                        }
                        $urlRumour->Url = $faker->url();
                        $urlRumour->ToConfirmed = true;
                        if ($faker->boolean()) {
                            $urlRumour->VerifiedBy_id = $users[$faker->numberBetween(0, $totalUsers)]->id;
                        }
                        $urlRumour->save();
                    }
                }
                for ($i = 0; $i <= $totalUsers && $i < self::MAX; $i++) {
                    if ($faker->boolean()) {
                        $urlRumour = new UrlRumourToVerify();
                        $urlRumour->rumour_id = $rumour->id;
                        if ($faker->boolean() || $faker->boolean()) {
                            $urlRumour->user_id = $users[$faker->numberBetween(0, $totalUsers)]->id;
                        }
                        $urlRumour->Url = $faker->url();
                        $urlRumour->ToConfirmed = false;
                        if ($faker->boolean()) {
                            $urlRumour->VerifiedBy_id = $users[$faker->numberBetween(0, $totalUsers)]->id;
                        }
                        $urlRumour->save();
                    }
                }
            }
        }
    }
}
