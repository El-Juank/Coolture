<?php

use Illuminate\Database\Seeder;

use App\User;
use App\EventMaker;
use App\UserRange;

class UserRangeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker= Faker\Factory::create();
        $users=User::get();
        $eventMakers=EventMaker::get();

        $totalEventMakers=count($eventMakers)-1;
        foreach($users as $user){
            $dic=[];
            for($i=0,$f=$faker->numberBetween(0,$totalEventMakers);$i<$f;$i++){
                $userRange=new UserRange();
                $userRange->user_id=$user->id;
                do{
                    $eventMaker=$eventMakers[$faker->numberBetween(0,$totalEventMakers)];
                }while(array_key_exists($eventMaker->id,$dic));
                $dic[$eventMaker->id]=null;
                $userRange->event_maker_id=$eventMaker->id;
                $userRange->Range=$faker->randomFloat(2,1,1000000);
                $userRange->save();


            }
        }
    }
}
