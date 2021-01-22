<?php

use Illuminate\Database\Seeder;

use App\User;
use App\EventMessage;
use App\LikeEventMessage;

class LikeEventMessageSeeder extends Seeder
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
        $eventMessages=EventMessage::get();
        $users=User::get();
        
        for($i=0,$iF=count($eventMessages),$jF=count($users);$i<$iF;$i++){
            for($j=0;$j<$jF&&$j<self::MAX;$j++){
                if($faker->boolean()){
                    $like=new LikeEventMessage();
                    $like->user_id=$users[$j]->id;
                    $like->event_message_id=$eventMessages[$i]->id;
                    $like->save();
                }
            }
        }
    }
}
