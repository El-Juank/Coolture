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
    const MAXBUCLE=100;
    public function run()
    {
        $faker= Faker\Factory::create();
        $users=User::get();
        $eventMakers=EventMaker::get();
        
        $totalEventMakers=count($eventMakers)-1;
    
        foreach($users as $user){
            $dic=[];
            $total=0;
            foreach(UserRange::where('user_id',$user->id)->get() as $uRange){
                $dic[$uRange->event_maker_id]=null;
            }
            for($i=0,$f=$faker->numberBetween(0,3);$i<$f;$i++){

                $userRange=new UserRange();
                $userRange->user_id=$user->id;
                do{
                    $eventMaker=$eventMakers[$faker->numberBetween(0,$totalEventMakers)];
                    $total++;
                }while(array_key_exists($eventMaker->id,$dic) && $total<self::MAXBUCLE );
                if($total<self::MAXBUCLE){
                $dic[$eventMaker->id]=null;
                $userRange->event_maker_id=$eventMaker->id;
                $userRange->Range=$faker->randomFloat(2,1,1000000);
                $userRange->save();
                }


            }
        }
    }
}
