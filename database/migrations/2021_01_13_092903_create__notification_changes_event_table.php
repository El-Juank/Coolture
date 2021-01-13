<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationChangesEventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('NotificationChangesEvent', function (Blueprint $table) {
            $table->id();
            $table->foreignId('Event_id')->references('id')->on('Events')->onDelete('cascade');
            $table->foreignId('User_id')->references('id')->on('users')->onDelete('cascade');
            //el camp update es el que s'ha de mirar per saber si l'usuari l'ha vist
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
        Schema::dropIfExists('NotificationChangesEvent');
    }
}
