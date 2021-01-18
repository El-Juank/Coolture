<?php

use Illuminate\Database\Seeder;

use App\User;
use App\RumourMessage;
use App\LikeRumourMessage;

class LikeEventMessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker= Faker\Factory::create();
        $eventMessages=RumourMessage::get();
        $users=User::get();
        
        for($i=0,$iF=count($eventMessages),$jF=count($users);$i<$iF;$i++){
            for($j=0;$j<$jF;$j++){
                if($faker->boolean()){
                    $like=new LikeRumourMessage();
                    $like->user_id=$users[$j]->id;
                    $like->Rumour_Message_id=$eventMessages[$i]->id;
                    $like->save();
                }
            }
        }
    }
}
