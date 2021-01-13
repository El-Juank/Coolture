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
            $table->foreingId('Event_id');
            $table->foreingId('User_id');
            //el camp update es el que s'ha de mirar per saber si l'usuari l'ha vist
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
