<?php

use Illuminate\Database\Seeder;

use App\User;
use App\RumourMessage;
use App\LikeRumourMessage;

class LikeRumourMessageSeeder extends Seeder
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
        $rumourMessages=RumourMessage::get();
        $users=User::get();
        
        for($i=0,$iF=count($rumourMessages),$jF=count($users);$i<$iF;$i++){
            for($j=0;$j<$jF&&$j<self::MAX;$j++){
                if($faker->boolean()){
                    $like=new LikeRumourMessage();
                    $like->user_id=$users[$j]->id;
                    $like->rumour_message_id=$rumourMessages[$i]->id;
                    $like->save();
                }
            }
        }
    }
}
