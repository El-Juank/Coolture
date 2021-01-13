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
            $table->foreing('User_id')->references('id')->on('EventMakers')->onDelete('null')->null();//si es null vol dir que s'en cuida la comunitat
            $table->foreingId('ImgProfile_id')->references('id')->on('Files')->onDelete('null')->null();
            $table->foreingId('ImgCover_id')->references('id')->on('Files')->onDelete('null')->null();

            $table->softDeletes();
            $table->timestamps();
        });
        Schema::create('EventMakers_translations', function (Blueprint $table) {
            $table->id();
            $table->foreingId('EventMaker_id')->references('id')->on('EventMakers')->onDelete('cascade');

            $table->string('Name',50);
            $table->string('Description',500)->null();

            $table->string('locale')->index();

            $table->unique(['EventMaker_id','locale']);
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
        Schema::dropIfExists('EventMakers_translations');
    }
}
