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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::create('notification_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('notification_id')->references('id')->on('notifications')->onDelete('cascade');
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
        Schema::dropIfExists('notification_translations');
        Schema::dropIfExists('notifications');
       
    }
}
