<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikesRumourTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('LikesRumour', function (Blueprint $table) {
            $table->id();

            $table->foreignId('Rumour_id');
            $table->foreignId('User_id');

            $table->boolean('Like');
            $table->boolean('Trust');
            
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
        Schema::dropIfExists('_likes_rumour');
    }
}
