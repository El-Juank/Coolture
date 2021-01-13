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

            $table->foreingId('User_id')->references('id')->on('Users')->onDelete('cascade');
            $table->foreingId('EventMaker_id')->references('id')->on('EventMakers')->onDelete('cascade');

            $table->decimal('Range',10,2);

            $table->unique(['User_id','EventMaker_id']);

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
