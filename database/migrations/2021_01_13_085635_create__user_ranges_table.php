<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserRangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('UserRanges', function (Blueprint $table) {
            $table->id();

            $table->foreignId('User_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('Event_Maker_id')->references('id')->on('EventMakers')->onDelete('cascade');

            $table->decimal('Range',10,2);

            $table->unique(['User_id','Event_Maker_id']);

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
        Schema::dropIfExists('UserRanges');
    }
}
