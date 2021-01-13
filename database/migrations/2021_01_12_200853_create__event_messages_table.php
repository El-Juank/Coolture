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

            $table->foreingId('Event_id')->references('id')->on('Event')->onDelete('cascade');
            $table->foreingId('User_id')->references('id')->on('Users')->onDelete('cascade');


            $table->boolean('Visible');
            $table->boolean('CanDelete');

            $table->timestamps();
            
        });
        Schema::create('EventMessages_translations', function (Blueprint $table) {
            $table->id();
            $table->foreingId('EventMessage_id')->references('id')->on('EventMessages')->onDelete('cascade');
        
            $table->string('Message',750);
            $table->string('locale')->index();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('EventMessages');
        Schema::dropIfExists('EventMessages_translations');
    }
}
