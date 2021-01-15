<?php

use Illuminate\Database\Seeder;

use App\Location;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for($i=0;$i<15;$i++){
            $location=new Location();
            $location->Lat=$faker->randomFloat(4,0,100);
            $location->Lon=$faker->randomFloat(4,0,100);
            $word=$faker->word();
            $location->{'Name:es'}=$word.'_ES';
            $location->{'Name:ca'}=$word.'_CA';
            $location->{'Name:en'}=$word.'_EN';
            $location->save();
        }
    }
}
