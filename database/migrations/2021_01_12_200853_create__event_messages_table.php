<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('EventMessages', function (Blueprint $table) {
            $table->id();

            $table->foreignId('Event_id')->references('id')->on('Events')->onDelete('cascade');
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');


            $table->boolean('Visible');
            $table->boolean('CanDelete');

            $table->timestamps();
            
        });
        Schema::create('EventMessage_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('Event_Message_id')->references('id')->on('EventMessages')->onDelete('cascade');
        
            $table->string('Message',750);
            $table->string('locale')->index();
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
        Schema::dropIfExists('EventMessage_translations');
        Schema::dropIfExists('EventMessages');

    }
}
