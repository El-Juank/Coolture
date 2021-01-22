<?php

use Illuminate\Database\Seeder;
use App\Event;
use App\User;
use App\NotificationChangeEvent;

class NotificationChangeEventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker= Faker\Factory::create();
        $events=Event::get();
        $users=User::get();
        
        for($i=0,$f=count($events),$jF=count($users);$i<$f;$i++){
            if($faker->boolean() && $faker->boolean()){//posso dos per que sigui més dificil que es doni
                //faig canvis
                $events[$i]->{'Description:ca'}='canvi_'.$events[$i]->{'Description:ca'}.'_canvi';
               $events[$i]->save();
                for($j=0;$j<$jF;$j++){
                    if($faker->boolean()){
                        $notificationChangeVista=new NotificationChangeEvent();
                        $notificationChangeVista->user_id=$users[$j]->id;
                        $notificationChangeVista->event_id=$events[$i]->id;
                        $notificationChangeVista->save();
                    }

                }
            }
        }
    }
}
