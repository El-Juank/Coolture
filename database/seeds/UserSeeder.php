<?php

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

use App\User;
use App\File;
use App\Location;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    const IMG_PROFILE = 1;
    const IMG_COVER = 2;

    const PROBABILITAT_GENERE=100;

    public function run()
    {
        $faker = Faker\Factory::create();
        $locations = Location::all();
        $imgsProfile = File::where('Path_id', self::IMG_PROFILE)->get();
        $imgsCover = File::where('Path_id', self::IMG_COVER)->get();

        $totalLocations = count($locations) - 1;
        $totalProfiles = count($imgsProfile) - 1;
        $totalCovers = count($imgsCover) - 1;

        for ($i = 0; $i < 15; $i++) {
            $user = new User();

            $user->name=$faker->name();
            $user->password=Hash::make($faker->word());
            $user->Country_id = $locations[$faker->numberBetween(0, $totalLocations)]->id;
            $user->DefaultLocation_id = $locations[$faker->numberBetween(0, $totalLocations)]->id;
            $user->email = $faker->email();

            $user->ImgProfile_id = $imgsProfile[$faker->numberBetween(0, $totalProfiles)]->id;
            $user->ImgCover_id = $imgsCover[$faker->numberBetween(0, $totalCovers)]->id;
            $user->BirthDate = $faker->date();
            $num = $faker->numberBetween(0, self::PROBABILITAT_GENERE);
            if ($num > 0) { //si es 0 es null
                $user->Gender = $num < (self::PROBABILITAT_GENERE/2); //si es mes petit de 5 es home, si no es home
            }

            $user->{'Description:es'}=$faker->sentence(1);
            $user->{'Description:ca'}=$faker->sentence(1);
            $user->{'Description:en'}=$faker->sentence(1);

            $user->{'Visible:es'}=true;
            $user->{'Visible:ca'}=true;
            $user->{'Visible:en'}=false;

            $user->save();
        }
    }
}
