<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRumoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Rumours', function (Blueprint $table) {
            $table->id();
            $table->string('Title',150);
            $table->string('Description',750);
            $table->boolean('IsVisible');
            $table->integer('OwnTrust');

            $table->string('Url_OfficialDenied',500)->null();//si es un rumor desmentit
            $table->string('Url_OfficialConfirmed',500)->null();//si es un rumor desmentit

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
        Schema::dropIfExists('Rumours');
    }
}
