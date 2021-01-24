<?php

namespace App;

class Translate {

const DIC=[
            'es'=>['ca','en'],
            'ca'=>['es','en'],
            'en'=>['es','ca']
          ];

    public static function Get($model,$param,$default=null){

        $lang=app()->getLocale(); 
        
        $value=self::IGet($model,$param,$lang);
        if($value==null){
            $array=self::DIC[$lang];
            for($i=0,$f=count($array);$i<$f&&$value==null;$i++){
                $value=self::IGet($model,$param,$array[$i]);
            }
        }
        if($value==null){
            $value=$default;
        }
        return $value;
    }
    static function IGet($model,$param,$lang){

        $value=null;

        if($model->hasTranslation($lang)){
         $value= $model->translate($lang)->getAttribute($param);
        }
        
        return $value; 
    }









}

















?>