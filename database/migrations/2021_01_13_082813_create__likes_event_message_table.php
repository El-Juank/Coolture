<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikesEventMessageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('LikesEventMessage', function (Blueprint $table) {
            $table->id();

            $table->foreignId('User_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('Event_id')->references('id')->on('Events')->onDelete('cascade');

            $table->unique(['User_id','Event_id']);
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
        Schema::dropIfExists('LikesEventMessage');
    }
}
