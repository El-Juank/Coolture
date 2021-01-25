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
        Schema::create('rumourmessages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rumour_id')->references('id')->on('rumours')->onDelete('cascade');
            $table->foreignId('user_id')->default(App\User::COMUNITY_ID)->references('id')->on('users')->onDelete('set default');
   
 
            $table->boolean('Visible')->default(true);
            $table->boolean('CanDelete')->default(false);

            $table->timestamps();
        });
        Schema::create('rumourmessage_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rumour_message_id')->references('id')->on('rumourmessages')->onDelete('cascade');
        
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
        Schema::dropIfExists('rumourmessage_translations');
        Schema::dropIfExists('rumourmessages');

    }
}
