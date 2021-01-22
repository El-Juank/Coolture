<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Rumour;
use App\LikeRumour;

class LikeRumourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker= Faker\Factory::create();
        $rumours=Rumour::get();
        $users=User::get();
        for($i=0,$iF=count($rumours),$jF=count($users);$i<$iF;$i++){
            for($j=0;$j<$jF;$j++){
                if($faker->boolean()){
                    $like=new LikeRumour();
                    $like->user_id=$users[$j]->id;
                    $like->rumour_id=$rumours[$i]->id;
                    $like->Like=$faker->boolean();
                    $like->Trust=$faker->boolean();
                    $like->save();
                }
            }
        }
    }
}
