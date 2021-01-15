<?php

use App\File;
use Illuminate\Database\Seeder;

class FileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $file = new File();
            $file->Path_id = $faker->randomDigitNotNull;
            $file->name = $faker->word;
            $file->format = $faker->fileExtension;
            $file->save();
        }
    }
}
