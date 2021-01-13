<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikesEventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('LikesEvent', function (Blueprint $table) {
            $table->id();
            $table->foreingId('Event_id')->references('id')->on('Events')->onDelete('cascade');
            $table->foreignId('User_id')->references('id')->on('Users')->onDelete('cascade');
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
        Schema::dropIfExists('LikesEvent');
    }
}
