<?php

use Illuminate\Database\Seeder;

use App\Category;
use App\EventMaker;
use App\Subcategory;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    const MIN=3;
    public function run()
    {
        $faker= Faker\Factory::create();
        $categories=Category::get();
        $eventMakers=EventMaker::get();
        
        $totalCategories=count($categories)-1;

        foreach($eventMakers as $eventMaker){
            $dic=array();
            for($i=0,$f=$faker->numberBetween(self::MIN,$totalCategories);$i<$f;$i++){
                $subcategory=new Subcategory();
                $subcategory->event_maker_id=$eventMaker->id;
                do{
                $category_id=$categories[$faker->numberBetween(0,$totalCategories)]->id;

                }while(array_key_exists($category_id,$dic));
                $dic[$category_id]=null;//afegeixo el valor per no tornar-ho a repetir
                $subcategory->category_id=$category_id;
                $subcategory->save();
            }
        }
    }
}
