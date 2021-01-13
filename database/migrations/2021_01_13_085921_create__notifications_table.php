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
        Schema::create('Notifications_translations', function (Blueprint $table) {
            $table->id();
            $table->foreingId('Notification_id')->references('id')->on('Notification')->onDelete('cascade');
            $table->string('Message',500);

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
        Schema::dropIfExists('Notifications');
        Schema::dropIfExists('Notifications_translations');
    }
}
