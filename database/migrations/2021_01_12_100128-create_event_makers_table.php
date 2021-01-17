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
        Schema::create('EventMakers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('User_id')->nullable()->references('id')->on('users')->onDelete('set null');//si es null vol dir que s'en cuida la comunitat
            $table->foreignId('ImgProfile_id')->nullable()->references('id')->on('Files')->onDelete('set null');
            $table->foreignId('ImgCover_id')->nullable()->references('id')->on('Files')->onDelete('set null');

            $table->softDeletes();
            $table->timestamps();
        });
        Schema::create('EventMaker_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('Event_Maker_id')->references('id')->on('EventMakers')->onDelete('cascade');

            $table->string('Name',50);
            $table->string('Description',500)->nullable();

            $table->string('locale')->index();

            $table->unique(['Event_Maker_id','locale']);
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
        Schema::dropIfExists('EventMakers');
        Schema::dropIfExists('EventMaker_translations');
    }
}
