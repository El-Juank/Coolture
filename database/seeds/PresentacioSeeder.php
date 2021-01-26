<?php

namespace App;

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
    const FORMAT_IMG_PROFILE = 'jpeg';
    const FORMAT_IMG_COVER = 'jpeg';
    const  FORMAT_IMG_EVENT = 'jpeg';
    const  FORMAT_IMG_PREVIEW = 'jpeg';

    const IDIOMES = ['ca', 'es', 'en'];
    const SEPARADOR_IDIOMES = '.';

    public function run()
    {

        //llegeixo les carpetes y les seves dades
        self::UsersSeed();
        self::CategoriesSeed();
        self::EventMakersSeed();
        self::LocationsSeed();
        self::EventsSeed();
        self::RumoursSeed();
        //poso els altres seeders fakers
    }
    static function UsersSeed(){}
    static function LocationsSeed(){}
    static function RumoursSeed()
    {
        $faker = Factory::create();

        $locations = Location::all();
        $totalLocations = count($locations);

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
                $eventmakerT = EventMakerTranslation::where('Name', $files[$i])->first();
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
                $camps = explode(self::SEPARADOR_IDIOMES, $files[$i]);
                $eventmakerT = EventMakerTranslation::where('Name', $camps[0])->first();
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
                $camps = explode(self::SEPARADOR_IDIOMES, $files[$i]);
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
                for ($j = 0, $fJ = count($camps); $j < $fJ && !feof($descs); $j++) {
                    $eventmaker->translate(self::IDIOMES[$j])->Name = $camps[$j];
                    $eventmaker->translate(self::IDIOMES[$j])->Description = fgets($descs);
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
                $camps = explode(self::SEPARADOR_IDIOMES, $files[$i]);
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
