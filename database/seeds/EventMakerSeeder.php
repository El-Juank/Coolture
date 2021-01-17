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
    const IMG_PROFILE_ID=1;
    const IMG_COVER_ID=2;

    public function run()
    {
        $faker = Faker\Factory::create();
        $users=User::all();
        $imgsProfile=File::where('Path_id',self::IMG_PROFILE_ID)->get();
        $imgsCover=File::where('Path_id',self::IMG_COVER_ID)->get();

        $totalUsers=count($users)-1;
        $totalImgProfiles=count($imgsProfile)-1;
        $totalImgCovers=count($imgsCover)-1;

        for($i=0;$i<7;$i++){
            $eventMaker=new EventMaker();

            $eventMaker->User_id=$users[$faker->numberBetween(0,$totalUsers)]->id;
            $eventMaker->ImgProfile_id=$imgsProfile[$faker->numberBetween(0,$totalImgProfiles)]->id;
            $eventMaker->ImgCover_id=$imgsCover[$faker->numberBetween(0,$totalImgCovers)]->id;

            $name=$faker->name();
            $eventMaker->{'Name:es'}=$name.'_ES';
            $eventMaker->{'Name:ca'}=$name.'_CA';
            $eventMaker->{'Name:en'}=$name.'_EN';

            $desc=$faker->sentence(50);
            $eventMaker->{'Description:es'}=$desc.'_ES';
            $eventMaker->{'Description:ca'}=$desc.'_CA';
            $eventMaker->{'Description:en'}=$desc.'_EN';

            $eventMaker->save();
        }
    }
}
