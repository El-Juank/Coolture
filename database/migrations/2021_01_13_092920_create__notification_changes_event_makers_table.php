<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationChangesEventMakersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('NotificationChangesEventMaker', function (Blueprint $table) {
            $table->id();

            $table->foreignId('EventMaker_id')->references('id')->on('EventMakers')->onDelete('cascade');
            $table->foreignId('User_id')->references('id')->on('users')->onDelete('cascade');

            //last update is last user sight
            $table->unique(['User_id','EventMaker_id']);
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
        Schema::dropIfExists('NotificationChangesEventMaker');
    }
}
