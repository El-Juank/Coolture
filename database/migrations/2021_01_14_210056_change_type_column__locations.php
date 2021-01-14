<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeTypeColumnLocations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Locations', function (Blueprint $table){
            $table->decimal('Lat',7,4)->change();
            $table->decimal('Lon',7,4)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Locations', function (Blueprint $table){
            $table->point('Lat')->change();
            $table->point('Lon')->change();
        });
    }
}
