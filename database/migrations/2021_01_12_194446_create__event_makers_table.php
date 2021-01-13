<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventMakersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('EventMakers', function (Blueprint $table) {
            $table->id();
            $table->foreing('User_id')->null();//si es null vol dir que s'en cuida la comunitat
            $table->string('Name',50);
            $table->string('Description',500)->null();
            $table->string('ImgCover',150)->null();
            $table->string('ImgProfile',150)->null();





            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('EventMakers');
    }
}
