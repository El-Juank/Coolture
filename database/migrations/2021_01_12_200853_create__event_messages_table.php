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
        Schema::create('eventmessages', function (Blueprint $table) {
            $table->id();

            $table->foreignId('event_id')->references('id')->on('events')->onDelete('cascade');
            $table->foreignId('user_id')->nullable()->references('id')->on('users')->onDelete('set null');


            $table->boolean('Visible')->default(true);
            $table->boolean('CanDelete')->default(false);

            $table->timestamps();
            
        });
        Schema::create('eventmessage_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_message_id')->references('id')->on('eventmessages')->onDelete('cascade');
        
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
