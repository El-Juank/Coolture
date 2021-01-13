<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRumourMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('RumourMessages', function (Blueprint $table) {
            $table->id();
            $table->foreingId('Rumour_id');
            $table->foreingId('User_id');
            $table->string('Message',750);
 
            $table->boolean('Visible');
            $table->boolean('CanDelete');
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
        Schema::dropIfExists('_rumour_messages');
    }
}
