<?php

use App\Category;
use App\File;

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    const PATH_ID_CATEGORIES = 2;
    const PATH_ID_CATEGORIES_ICO = 3;
    public function run()
    {



        $faker = Faker\Factory::create();
        $imgs = File::where('Path_id', self::PATH_ID_CATEGORIES)->get();
        $icons = File::where('Path_id', self::PATH_ID_CATEGORIES_ICO)->get();
        $category_names = ['Music', 'Books', 'Theatre', 'Dance', 'Opera', 'Painting'];
        $totalImgs = count($imgs)-1;
        $totalIcons = count($icons)-1;
        $i = 0;

        foreach ($category_names as $category_name) {

            $category = new Category;
            $category->ImgIcon_id = $icons[$faker->numberBetween(0, $totalIcons)]->id; //Dona num de 0 a 10
            $category->Img_id = $imgs[$faker->numberBetween(2, $totalImgs)]->id; //Dona num de 0 a 10

            $category->{'Name:es'} = $category_name . '_ES';
            if ($i % 2 == 0) {
                $category->{'Name:ca'} = $category_name . '_CA';
            }
            $category->{'Name:en'} = $category_name . '_EN';
            $category->save();
            $i++;
        }
    }
}
