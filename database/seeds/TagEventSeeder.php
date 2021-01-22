<?php

use Illuminate\Database\Seeder;

use App\Tag;
use App\Event;
use App\TagEvent;

class TagEventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker= Faker\Factory::create();
        $tags=Tag::get();
        $events=Event::get();

        $totalTags=count($tags)-1;
        foreach($events as $event){
            $dic=[];
            for($i=0,$f=$faker->numberBetween(0,$totalTags);$i<$f;$i++){
                $eventTag=new TagEvent();
                do{
                    $tag=$tags[$faker->numberBetween(0,$totalTags)];
                }while(array_key_exists($tag->id,$dic));
                $dic[$tag->id]=null;

                $eventTag->tag_id=$tag->id;
                $eventTag->event_id=$event->id;
                $eventTag->save();


            }
        }


    }
}
