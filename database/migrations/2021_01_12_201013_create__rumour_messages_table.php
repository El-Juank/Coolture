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
            $table->foreignId('Rumour_id')->references('id')->on('Rumours')->onDelete('cascade');
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
   
 
            $table->boolean('Visible');
            $table->boolean('CanDelete');

            $table->timestamps();
        });
        Schema::create('RumourMessage_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('Rumour_Message_id')->references('id')->on('RumourMessages')->onDelete('cascade');
        
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
        Schema::dropIfExists('RumourMessage_translations');
        Schema::dropIfExists('RumourMessages');

    }
}
