<?php

use Illuminate\Database\Seeder;

use App\Message;
use App\User;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    const TRASHED_PERCENT=100;
    const TRASHED_PERCENT_MIN=5;
    public function run()
    {
        $faker = Faker\Factory::create();
        $users=User::get();
        $totalUsers=count($users)-1;
        for($i=0;$i<15;$i++){
            $from=$users[$faker->numberBetween(0,$totalUsers)]->id;
            $to=$users[$faker->numberBetween(0,$totalUsers)]->id;
            for($j=0;$j<4;$j++){
                $message=new Message();
                $message->FromUser_id=$from;
                $message->ToUser_id=$to;
                $message->Message=$faker->sentence(20);
                if($faker->numberBetween(0,self::TRASHED_PERCENT)<=self::TRASHED_PERCENT_MIN){
                    $message->Trashed=$faker->datetime();
                    $message->CanDelete=$faker->boolean();
                }

                $message->save();
               
            }

        }
    }
}
