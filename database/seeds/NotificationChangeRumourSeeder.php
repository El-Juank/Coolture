<?php

use Illuminate\Database\Seeder;
use App\NotificationChangeRumour;
use App\Rumour;
use App\User;

class NotificationChangeRumourSeeder extends Seeder
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
        
        for($i=0,$f=count($rumours),$jF=count($users);$i<$f;$i++){
            if($faker->boolean() && $faker->boolean()){//posso dos per que sigui més dificil que es doni
                //faig canvis
                $rumours[$i]->{'Description:ca'}='canvi_'.$rumours[$i]->{'Description:ca'}.'_canvi';
                 $rumours[$i]->save();
                for($j=0;$j<$jF;$j++){
                    if($faker->boolean()){
                        $notificationChangeVista=new NotificationChangeRumour();
                        $notificationChangeVista->user_id=$users[$j]->id;
                        $notificationChangeVista->rumour_id=$rumours[$i]->id;
                        $notificationChangeVista->save();
                    }

                }
            }
        }
    }
}
