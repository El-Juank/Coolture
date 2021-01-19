<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    public function Path(){
        return $this->belongsTo(Path::class);
    }
    public function Url(){
        $path=$this->Path();
        return $path->Url.'\\'.$this->Name.'.'.$this->Format;
    }
    public function Purgue(){
        //esborro del disc
        $root = "public/";
        $path=$this->Path();
         //esborro el fitxer del disc dur
        unlink($root.$path->Url.'/'.$this->Name.'.'.$this->Format);
        //esborro el path del fitxer de la BD
        $this->delete();
    }
    public static function PurgueAll(){
        $files=self::all();
        for($i=0,$f=count($files);$i<$f;$i++){
            $file=$files[$i];
            $esPotEsborrar=false;
            //mirar que no s'utilitzi a cap lloc
            //per fer
            if($esPotEsborrar){
                $file->Purgue();
            }
        }
    }
}
