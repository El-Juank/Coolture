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

    const PROBABILITAT_GENERE = 100;
    const MAX=10;

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

            $user->name = $faker->name();
            $user->password = Hash::make($faker->word());
            $user->Country_id = $locations[$faker->numberBetween(0, $totalLocations)]->id;
            $user->DefaultLocation_id = $locations[$faker->numberBetween(0, $totalLocations)]->id;
            $user->email = $faker->email();

            $user->ImgProfile_id = $imgsProfile[$faker->numberBetween(0, $totalProfiles)]->id;
            $user->ImgCover_id = $imgsCover[$faker->numberBetween(0, $totalCovers)]->id;
            $user->BirthDate = $faker->date();
            $num = $faker->numberBetween(0, self::PROBABILITAT_GENERE);
            if ($num > 0) { //si es 0 es null
                $user->Gender = $num < (self::PROBABILITAT_GENERE / 2); //si es mes petit de 5 es home, si no es home
            }
            $desc = $faker->sentence(50);
            $user->{'Description:ca'} = 'CA_' . $desc . '_CA';
            $user->{'Visible:ca'} = $faker->boolean();
            if ($faker->boolean()) {
                $user->{'Description:es'} = 'ES_' . $desc . '_ES';
                $user->{'Visible:es'} = $faker->boolean();
            }
            if ($faker->boolean()) {
                $user->{'Description:en'} = 'EN_' . $desc . '_EN';
                $user->{'Visible:en'} = $faker->boolean();
            }
        


            $user->save();
        }
        $users=User::get();
        for($i=0,$f=count($users)-1;$i<=$f && $i<self::MAX;$i++){
            if($faker->boolean()){
                $user->UserVerified_id= $users[$faker->numberBetween(0, $f)]->id;
                $user->save();
            }
        }
    }
}
