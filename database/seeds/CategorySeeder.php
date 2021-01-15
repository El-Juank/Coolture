<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        /*REVISAR

        $faker = Faker\Factory::create();

        $category_names=['Music', 'Books', 'Theatre', 'Dance','Opera', 'Painting'];
        $total=count($category_names);

        foreach($category_names as $category_name){

            $category = new Category;
            $category->ImgIcon_id = $faker->numberBetween(0, $total) ; //Dona num de 0 a 10

            $category->{'Name:es'} = $category_name;




        }


        */


    }
}
