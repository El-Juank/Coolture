<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationChangesRumourTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('NotificationChangesRumour', function (Blueprint $table) {
            $table->id();

            $table->foreingId('Rumour_id')->references('id')->on('Rumours')->onDelete('cascade');
            $table->foreingId('User_id')->references('id')->on('Users')->onDelete('cascade');
            //last update is last user sight
            $table->unique(['User_id','Rumour_id']);
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
        Schema::dropIfExists('NotificationChangesRumour');
    }
}
