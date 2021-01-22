<?php

use Illuminate\Database\Seeder;

use App\User;
use App\File;
use App\EventMaker;

class EventMakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    const IMG_PROFILE_ID = 1;
    const IMG_COVER_ID = 2;

    public function run()
    {
        $faker = Faker\Factory::create();
        $users = User::all();
        $imgsProfile = File::where('Path_id', self::IMG_PROFILE_ID)->get();
        $imgsCover = File::where('Path_id', self::IMG_COVER_ID)->get();

        $totalUsers = count($users) - 1;
        $totalImgProfiles = count($imgsProfile) - 1;
        $totalImgCovers = count($imgsCover) - 1;

        for ($i = 0; $i < 7; $i++) {
            $eventMaker = new EventMaker();
            if ($faker->boolean()) {
                $eventMaker->user_id = $users[$faker->numberBetween(0, $totalUsers)]->id;
            }
            if ($faker->boolean()||$faker->boolean()||$faker->boolean()) {
                $eventMaker->ImgProfile_id = $imgsProfile[$faker->numberBetween(0, $totalImgProfiles)]->id;
            }
            if ($faker->boolean()||$faker->boolean()||$faker->boolean()) {
                $eventMaker->ImgCover_id = $imgsCover[$faker->numberBetween(0, $totalImgCovers)]->id;
            }
            
            $name = $faker->name();
            $desc = $faker->sentence(25);

            if ($faker->boolean()) {
                $eventMaker->{'Name:es'} = $name . '_ES';
                $eventMaker->{'Description:es'} = 'ES_'.$desc . '_ES';
            }

            $eventMaker->{'Name:ca'} = $name . '_CA';
            $eventMaker->{'Description:ca'} = 'CA_'.$desc . '_CA';
            
            if ($faker->boolean()) {
                $eventMaker->{'Name:en'} = $name . '_EN';
                $eventMaker->{'Description:en'} = 'EN_'.$desc . '_EN';
            }

           
          
            
         

            $eventMaker->save();
        }
    }
}
