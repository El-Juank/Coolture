<?php

use App\Path;
use Illuminate\Database\Seeder;

class PathSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
        $directories = ['flags', 'gender', 'icons'];
        foreach ($directories as $dir) {
           self::AddPath($dir);
        }
    }
    public static function AddPath($dir){
        $root = 'img';
        $path = new Path();
        $path->Url = $root . '/' . $dir;
        $path->save();
    }
}
