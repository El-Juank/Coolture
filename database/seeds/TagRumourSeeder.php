<?php

use Illuminate\Database\Seeder;

use App\Tag;
use App\Rumour;
use App\TagRumour;

class TagRumourSeeder extends Seeder
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
        $rumours=Rumour::get();

        $totalTags=count($tags)-1;
        foreach($rumours as $rumour){
            $dic=[];
            for($i=0,$f=$faker->numberBetween(0,$totalTags);$i<$f;$i++){
                $rumourTag=new TagRumour();
                do{
                    $tag=$tags[$faker->numberBetween(0,$totalTags)];
                }while(array_key_exists($tag->id,$dic));
                $dic[$tag->id]=null;

                $rumourTag->tag_id=$tag->id;
                $rumourTag->rumour_id=$rumour->id;
                $rumourTag->save();


            }
        }
    }
}
