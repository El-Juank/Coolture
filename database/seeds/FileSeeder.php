<?php


use Illuminate\Database\Seeder;

use App\Path;
use App\File;

class FileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $paths = Path::where('id', '<>', Path::DEFAULT_PATH_ID)->get();

        for ($i = 0, $iF = count($paths); $i < $iF; $i++) {
            $path = $paths[$i]->Url;
            self::AddFiles($path, $paths[$i]->id);
        }
    }
    public static function AddFiles($path, $idPath)
    {
        $root = "public/";
        $files = scandir($root . $path);
        for ($j = 0, $jF = count($files); $j < $jF; $j++) {
            if (!is_dir($path . '/' . $files[$j])) {
                $file = new File();

                $campsFile = explode('.', $files[$j]);
                $file->path_id = $idPath;
                $file->Name = $campsFile[0];
                $file->Format = $campsFile[1];
                if($file->Name!='')
                    $file->save();
            }
        }
    }
}
