<?php

use Illuminate\Database\Seeder;
use App\EventMaker;
use App\User;
use App\NotificationChangeEventMaker;

class NotificationChangeEventMakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker= Faker\Factory::create();
        $eventMakers=EventMaker::get();
        $users=User::get();
        
        for($i=0,$f=count($eventMakers),$jF=count($users);$i<$f;$i++){
            if($faker->boolean() && $faker->boolean()){//posso dos per que sigui més dificil que es doni
                //faig canvis
                $eventMakers[$i]->{'Description:ca'}='canvi_'.$eventMakers[$i]->{'Description:ca'}.'_canvi';
                $eventMakers[$i]->save();
                for($j=0;$j<$jF;$j++){
                    if($faker->boolean()){
                        $notificationChangeVista=new NotificationChangeEventMaker();
                        $notificationChangeVista->user_id=$users[$j]->id;
                        $notificationChangeVista->event_maker_id=$eventMakers[$i]->id;
                        $notificationChangeVista->save();
                    }

                }
            }
        }
    }
}
