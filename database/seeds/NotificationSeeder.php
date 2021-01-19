<?php

use Illuminate\Database\Seeder;
use App\Notification;

class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker= Faker\Factory::create();
        for($i=0;$i<3;$i++){
            $notification=new Notification();
            $message=$faker->sentence(25);
            $notification->{'Message:es'}='ES_'.$message.'_ES';
            $notification->{'Message:ca'}='CA_'.$message.'_CA';
            $notification->{'Message:en'}='EN_'.$message.'_EN';
            $notification->save();
        }
    }
}
