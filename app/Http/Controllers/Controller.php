<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function test(){
        $root='img';
        $directories = $this->getSubDirectories( $root);
        return view('test')->with('dirs',$directories);
    }

    function getSubDirectories($dir)
{
    $subDir = array();
    $directories = array_filter(glob($dir), 'is_dir');
    $subDir = array_merge($subDir, $directories);
    foreach ($directories as $directory) $subDir = array_merge($subDir, $this->getSubDirectories($directory.'/*'));
    return $subDir;
}
}
