<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Event;
use App\LikeEvent;

class LikeEventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    const MAX=10;
    public function run()
    {
        $faker= Faker\Factory::create();
        $events=Event::get();
        $users=User::get();
        for($i=0,$iF=count($events),$jF=count($users);$i<$iF;$i++){
            for($j=0;$j<$jF&&$j<self::MAX;$j++){
                if($faker->boolean()){
                    $like=new LikeEvent();
                    $like->user_id=$users[$j]->id;
                    $like->event_id=$events[$i]->id;
                    $like->save();
                }
            }
        }
    }
}
