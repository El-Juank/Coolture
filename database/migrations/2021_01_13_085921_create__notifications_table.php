<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Notifications', function (Blueprint $table) {
            $table->id();
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::create('Notification_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('Notification_id')->references('id')->on('Notifications')->onDelete('cascade');
            $table->string('Message',500);
            $table->string('locale')->index();

            $table->softDeletes();
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
        Schema::dropIfExists('Notification_translations');
        Schema::dropIfExists('Notifications');
       
    }
}
