<?php

namespace App;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use Faker\Factory;

class PresentacioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    const ROOT = 'dataSeeder/';

    const FORMAT_ICON_CATEGORY = 'svg';
    const FORMAT_IMG_CATEGORY = 'jpeg';
    const FORMAT_IMG_PROFILE = 'jpg';
    const FORMAT_IMG_COVER = 'jpg';
    const  FORMAT_IMG_EVENT = 'jpeg';
    const  FORMAT_IMG_PREVIEW = 'jpeg';

    const IDIOMES = ['ca', 'es', 'en'];
    const SEPARADOR_IDIOMES = '.';
    const SEPARADOR_LOCATION = ';';
    const SEPARADOR_MESSAGES = ';';

    const PROBABILITAT_GENERE = 100;

    public function run()
    {

        self::LocationsSeed();
        self::CategoriesSeed();
        self::UsersSeed();
        self::EventMakersSeed();
        self::RumoursSeed();
        self::EventsSeed();

        $this->call(RoleSeeder::class);
        $this->call(PermissionSeeder::class);

        self::MessagesSeeder();

        $this->call(LikeEventSeeder::class);
        $this->call(LikeRumourSeeder::class);
        $this->call(LikeEventMessageSeeder::class);
        $this->call(LikeRumourMessageSeeder::class);
        $this->call(AssistanceSeeder::class);

        $this->call(MessageSeeder::class);
        $this->call(RangeSeeder::class);
        $this->call(SubcategorySeeder::class);
        $this->call(TagSeeder::class);
        $this->call(TagEventSeeder::class);
        self::TagsSeeder();
        $this->call(UserRangeSeeder::class);
        $this->call(NotificationSeeder::class);
        $this->call(NotificationChangeEventSeeder::class);
        $this->call(NotificationChangeEventMakerSeeder::class);
        $this->call(NotificationChangeRumourSeeder::class);

        $this->call(UrlRumourToVerifySeeder::class);

        //llegeixo les carpetes y les seves dades




        //poso els altres seeders fakers
    }
    static function TagsSeeder()
    {
        //llegeixo paraules
        $tags = fopen('public/' . self::ROOT . 'Tags.txt', 'r');
        while (!feof($tags)) {
            $tag = new Tag();
            $tag->Name = fgets($tags);
            $tag->save();
        }
        fclose($tags);
    }
    static function MessagesSeeder()
    {
        $faker = Factory::create();
        $dirEvents = 'public/' . self::ROOT . 'Events';
        $dirRumours = 'public/' . self::ROOT . 'Rumours';

        $fEvents = scandir($dirEvents);
        $fRumours = scandir($dirRumours);

        $events = Event::all();
        $rumours = Rumour::all();
        $users = User::all();

        $totalEvents = count($events) - 1;
        $totalRumours = count($rumours) - 1;
        $totalUsers = count($users) - 1;
        //rumours
        for ($i = 0, $f = count($fRumours); $i < $f; $i++) {
            $rumour = $rumours[$faker->numberBetween(0, $totalRumours)];
            $fRumour = fopen($fRumours[$f], 'r');
            while (!feof($fRumour)) {
                $message = new RumourMessage();
                $message->rumour_id = $rumour->id;
                $message->user_id = $users[$faker->numberBetween(0, $totalUsers)]->id;
                $linea = fgets($fRumour);
                if (str_contains($linea, self::SEPARADOR_MESSAGES)) {
                    $camps = explode(self::SEPARADOR_MESSAGES, $linea);
                } else {
                    $camps = [$linea];
                }
                for ($j = 0, $fJ = count($camps); $j < $fJ; $j++) {
                    $message->translate(self::IDIOMES[$j])->Message = $camps[$j];
                }
                $message->save();
            }
            fclose($fRumour);
        }
        //events
        for ($i = 0, $f = count($fEvents); $i < $f; $i++) {
            $event = $events[$faker->numberBetween(0, $totalEvents)];
            $fEvent = fopen($fEvents[$f], 'r');
            while (!feof($fEvent)) {
                $message = new EventMessage();
                $message->event_id = $event->id;
                $message->user_id = $users[$faker->numberBetween(0, $totalUsers)]->id;
                $linea = fgets($fEvent);
                if (str_contains($linea, self::SEPARADOR_MESSAGES)) {
                    $camps = explode(self::SEPARADOR_MESSAGES, $linea);
                } else {
                    $camps = [$linea];
                }
                for ($j = 0, $fJ = count($camps); $j < $fJ; $j++) {
                    $message->translate(self::IDIOMES[$j])->Message = $camps[$j];
                }
                $message->save();
            }
            fclose($fEvent);
        }
    }
    static function UsersSeed()
    {
        $faker = Factory::create();
        $password = Hash::make('coolture');
        $locations = Location::all();
        $totalLocations = count($locations);
        $dir = self::ROOT . 'Rumours';
        $fullDir = 'public/' . $dir;
        $descriptions = scandir($fullDir);


        $pathImgsCover = new Path();
        $pathImgsCover->Url = $dir . 'ImgsCover';
        $pathImgsCover->save();

        $pathImgsProfile = new Path();
        $pathImgsProfile->Url = $dir . 'ImgsProfile';
        $pathImgsProfile->save();
        //entro Usuaris
        for ($i = 0, $f = count($descriptions); $i < $f; $i++) {
            if (!is_dir($descriptions[$i])) {
                $user = new User();
                if (is_numeric($descriptions[$i])) {
                    $user->name = $faker->name();
                    $user->email = $faker->email();
                } else {
                    $user->name = $descriptions[$i];
                    $user->email = $descriptions[$i].'@email.com';
                }
                
                $user->password = $password;
                $user->Country_id = $locations[$faker->numberBetween(0, $totalLocations)]->id;
                $user->DefaultLocation_id = $locations[$faker->numberBetween(0, $totalLocations)]->id;
                $user->BirthDate = $faker->date();
                $num = $faker->numberBetween(0, self::PROBABILITAT_GENERE);
                if ($num > 0) { //si es 0 es null
                    $user->Gender = $num < (self::PROBABILITAT_GENERE / 2); //si es mes petit de 5 es home, si no es home
                }
                if (file_exists('public/' . $pathImgsCover->Url . '/' . $descriptions[$i] . '.' . self::FORMAT_IMG_COVER)) {
                    $img = new File();
                    $img->path_id = $pathImgsCover->id;
                    $img->Name = $descriptions[$i];
                    $img->Format = self::FORMAT_IMG_COVER;
                    $img->save();
                    $user->imgCover_id = $img->id;
                }
                if (file_exists('public/' . $pathImgsProfile->Url . '/' . $descriptions[$i]) . '.' . self::FORMAT_IMG_PROFILE) {
                    $img = new File();
                    $img->path_id = $pathImgsProfile->id;
                    $img->Name = $descriptions[$i];
                    $img->Format = self::FORMAT_IMG_PROFILE;
                    $img->save();
                    $user->imgProfile_id = $img->id;
                }
                $desc = fopen($fullDir . $descriptions[$i], 'r');
                for ($j = 0, $fJ = count(self::IDIOMES); $i < $fJ && !feof($desc); $i++) {
                    $user->translate(self::IDIOMES[$j])->Description = fgets($desc);
                }
                fclose($desc);
                $user->save();
            }
        }
        //valido alguns
    }
    static function LocationsSeed()
    {
        $locations = fopen('public/' . self::ROOT . 'Locations.txt', 'r');
        fgets($locations); //ometo la capçalera
        while (!feof($locations)) {
            $camps = explode(self::SEPARADOR_LOCATION, fgets($locations));
            $location = new Location();
            $location->Lat = $camps[0];
            $location->Lon = $camps[1];
            for ($i = 2, $f = count($camps), $j = 0; $i < $f; $i++, $j++) {
                $location->translate(self::IDIOMES[$j])->Name = $camps[$i];
            }
            $location->save();
        }
        fclose($locations);
    }
    static function RumoursSeed()
    {
        $faker = Factory::create();

        $locations = Location::all();
        $totalLocations = count($locations) - 1;

        $dir = self::ROOT . 'Rumours';
        $fullDir = 'public/' . $dir;
        $files = scandir($fullDir);

        $pathImgsCover = new Path();
        $pathImgsCover->Url = $dir . 'ImgsCover';
        $pathImgsCover->save();

        $pathImgsPreview = new Path();
        $pathImgsPreview->Url = $dir . 'ImgsPreview';
        $pathImgsPreview->save();

        for ($i = 0, $f = count($files); $i < $f; $i++) {
            if (!is_dir($files[$i])) {
                $eventmakerT = EventMakerTranslation::where('Name', str_replace('_', ' ', explode(self::SEPARADOR_IDIOMES, $files[$i])[0]))->first();
                $rumour = new Rumour();
                if ($eventmakerT != null) {
                    $rumour->event_maker_id = $eventmakerT->event_maker_id;
                }
                if (file_exists('public/' . $pathImgsCover->Url . '/' . $files[$i] . '.' . self::FORMAT_IMG_COVER)) {
                    $img = new File();
                    $img->path_id = $pathImgsCover->id;
                    $img->Name = $files[$i];
                    $img->Format = self::FORMAT_IMG_COVER;
                    $img->save();
                    $rumour->imgCover_id = $img->id;
                }
                if (file_exists('public/' . $pathImgsPreview->Url . '/' . $files[$i]) . '.' . self::FORMAT_IMG_PREVIEW) {
                    $img = new File();
                    $img->path_id = $pathImgsPreview->id;
                    $img->Name = $files[$i];
                    $img->Format = self::FORMAT_IMG_PREVIEW;
                    $img->save();
                    $rumour->imgPreview_id = $img->id;
                }
                $rumour->IsVisible = true;
                $rumour->OwnTrust = $faker->numberBetween(Rumour::MIN_TRUST, Rumour::MAX_TRUST);
                $rumour->location_id = $locations[$faker->numberBetween(0, $totalLocations)]->id;

                $data = fopen($fullDir . $files[$i], 'r');
                for ($j = 0, $jF = count(self::IDIOMES[$j]); $j < $jF && !feof($data); $j++) {
                    $rumour->transfer(self::IDIOMES[$j])->Title = fgets($data);
                    $rumour->transfer(self::IDIOMES[$j])->Description = fgets($data);
                }
                fclose($data);
                $rumour->save();
            }
        }
    }
    static function EventsSeed()
    {
        $dir = self::ROOT . 'Events';
        $fullDir = 'public/' . $dir;
        $files = scandir($fullDir);

        $pathImgsEvent = new Path();
        $pathImgsEvent->Url = $dir . 'ImgsEvent';
        $pathImgsEvent->save();

        $pathImgsPreview = new Path();
        $pathImgsPreview->Url = $dir . 'ImgsPreview';
        $pathImgsPreview->save();

        for ($i = 0, $f = count($files); $i < $f; $i++) {
            if (!is_dir($files[$i])) {
                if (str_contains($files[$i], self::SEPARADOR_IDIOMES)) {
                    $camps = explode(self::SEPARADOR_IDIOMES, $files[$i]);
                } else {
                    $camps = [$files[$i]];
                }
                $eventmakerT = EventMakerTranslation::where('Name', str_replace('_', ' ',  $camps[0]))->first();
                $event = new Event();
                $event->event_maker_id = $eventmakerT->event_maker_id;
                if (file_exists('public/' . $pathImgsEvent->Url . '/' . $files[$i] . '.' . self::FORMAT_IMG_EVENT)) {

                    $img = new File();
                    $img->path_id = $pathImgsEvent->id;
                    $img->Name = $files[$i];
                    $img->Format = self::FORMAT_IMG_EVENT;
                    $img->save();
                    $event->imgEvent_id = $img->id;
                }
                if (file_exists('public/' . $pathImgsPreview->Url . '/' . $files[$i] . '.' . self::FORMAT_IMG_PREVIEW)) {

                    $img = new File();
                    $img->path_id = $pathImgsPreview->id;
                    $img->Name = $files[$i];
                    $img->Format = self::FORMAT_IMG_PREVIEW;
                    $img->save();
                    $event->imgPreview_id = $img->id;
                }

                $data = fopen($fullDir . $files[$i], 'r');
                for ($j = 0, $jF = count($camps); $j < $jF && !feof($data); $j++) {
                    $event->transfer(self::IDIOMES[$j])->Title = fgets($data);
                    $event->transfer(self::IDIOMES[$j])->Description = fgets($data);
                }
                fclose($data);
                $event->save();
            }
        }
    }
    static function EventMakersSeed()
    {
        $dir = self::ROOT . 'EventMakers';
        $fullDir = 'public/' . $dir;
        $files = scandir($fullDir);

        $pathImgsProfile = new Path();
        $pathImgsProfile->Url = $dir . 'ImgsProfile';
        $pathImgsProfile->save();

        $pathImgsCover = new Path();
        $pathImgsCover->Url = $dir . 'ImgsCover';
        $pathImgsCover->save();

        for ($i = 0, $f = count($files); $i < $f; $i++) {
            if (!is_dir($files[$i])) {
                if (str_contains($files[$i], self::SEPARADOR_IDIOMES)) {
                    $camps = explode(self::SEPARADOR_IDIOMES, $files[$i]);
                } else {
                    $camps = [$files[$i]];
                }
                $eventmaker = new EventMaker();
                if (file_exists('public/' . $pathImgsProfile->Url . '/' . $files[$i] . '.' . self::FORMAT_IMG_PROFILE)) {

                    $img = new File();
                    $img->path_id = $pathImgsProfile->id;
                    $img->Name = $camps[0];
                    $img->Format = self::FORMAT_IMG_PROFILE;
                    $img->save();

                    $eventmaker->ImgProfile_id = $img->id;
                }
                if (file_exists('public/' . $pathImgsCover->Url . '/' . $files[$i] . '.' . self::FORMAT_IMG_COVER)) {

                    $img = new File();
                    $img->path_id = $pathImgsCover->id;
                    $img->Name = $camps[0];
                    $img->Format = self::FORMAT_IMG_COVER;
                    $img->save();

                    $eventmaker->ImgCover_id = $img->id;
                }

                $descs = fopen($fullDir . $files[$i], "r");
                $j = 0;
                $fJ = count($camps) - 1;
                while (!feof($descs)) {

                    $eventmaker->translate(self::IDIOMES[$j])->Name = str_replace('_', ' ', $camps[$j]);
                    $eventmaker->translate(self::IDIOMES[$j])->Description = fgets($descs);
                    if ($j < $fJ) {
                        $j++;
                    }
                }
                fclose($descs);
                $eventmaker->save();
            }
        }
    }
    static function CategoriesSeed()
    {

        $dir = self::ROOT . 'Categories';

        $pathIcon = new Path();
        $pathIcon->Url = $dir . '/Icon';
        $pathIcon->save();

        $pathImg = new Path();
        $pathImg->Url = $dir . '/Image';
        $pathImg->save();

        $files = scandir('public/' . $dir);

        for ($i = 0, $f = count($files); $i < $f; $i++) {
            if (!is_dir($files[$i])) {
                if (str_contains($files[$i], self::SEPARADOR_IDIOMES)) {
                    $camps = explode(self::SEPARADOR_IDIOMES, $files[$i]);
                } else {
                    $camps = [$files[$i]];
                }
                $category = new Category();
                if (file_exists('public/' . $pathIcon->Url . '/' . $files[$i] . '.' . self::FORMAT_ICON_CATEGORY)) {

                    $imgIcon = new File();
                    $imgIcon->path_id = $pathIcon->id;
                    $imgIcon->Name = $camps[0];
                    $imgIcon->Format = self::FORMAT_ICON_CATEGORY;
                    $imgIcon->save();
                    $category->ImgIcon_id = $imgIcon->id;
                }
                if (file_exists('public/' . $pathImg->Url . '/' . $camps[0] . '.' . self::FORMAT_IMG_CATEGORY)) {

                    $img = new File();
                    $img->path_id = $pathImg->id;
                    $img->Name = $camps[0];
                    $img->Format = self::FORMAT_IMG_CATEGORY;
                    $img->save();
                    $category->Img_id = $img->id;
                }
                for ($j = 0, $jF = count($camps); $j < $jF; $j++) {
                    $category->translate(self::IDIOMES[$j])->Name = $camps[$j];
                }
                $category->save();
            }
        }
    }
}
