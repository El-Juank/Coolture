<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EventMakersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventMakers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->references('id')->on('users')->onDelete('set null');//si es null vol dir que s'en cuida la comunitat
            $table->foreignId('ImgProfile_id')->nullable()->references('id')->on('files')->onDelete('set null');
            $table->foreignId('ImgCover_id')->nullable()->references('id')->on('files')->onDelete('set null');

            $table->softDeletes();
            $table->timestamps();
        });
        Schema::create('EventMaker_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_maker_id')->references('id')->on('eventmakers')->onDelete('cascade');

            $table->string('Name',50);
            $table->string('Description',500)->nullable();

            $table->string('locale')->index();

            $table->unique(['event_maker_id','locale']);
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
        Schema::dropIfExists('EventMaker_translations');
        Schema::dropIfExists('EventMakers');
      
    }
}
