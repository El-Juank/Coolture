<?php

use Illuminate\Database\Seeder;
use App\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker\Factory::create();
        $dic=[];
        for($i = 0; $i <182;$i++){
            $tag=new Tag();
            do{
            $word=$faker->word();
            }while(array_key_exists($word,$dic));
            $dic[$word]=null;
            $tag->Name=$word;
            $tag->save();
        }
    }
}
