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
        $root="public\\";
        $paths=Path::all();

        for($i=0,$iF=count($paths);$i<$iF;$i++){
            $path=$root.($paths[$i]->Url);
            $files=scandir($path);
            for($j=0,$jF=count($files);$j<$jF;$j++){
                if(!is_dir($path.'\\'.$files[$j])){
                    $file=new File();
        
                    $campsFile=explode('.',$files[$j]);
                    $file->Path_id=$paths[$i]->id;
                    $file->Name=$campsFile[0];
                    $file->Format=$campsFile[1];
                    $file->save();
                }
            }
        }
       
    }
}

