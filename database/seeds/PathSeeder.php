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
        $root = 'img';
        $directories = ['flags', 'gender', 'icons'];
        foreach ($directories as $dir) {
            $path = new Path();
            $path->Url = $root . '/' . $dir;
            $path->save();
        }
    }
}
