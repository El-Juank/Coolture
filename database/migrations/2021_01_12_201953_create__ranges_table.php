<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ranges', function (Blueprint $table) {
            $table->id();

            $table->foreignId('location_id')->references('id')->on('locations')->onDelete('cascade');
            $table->foreignId('event_id')->references('id')->on('events')->onDelete('cascade');
            $table->decimal('Range',10,2);
            $table->unique(['location_id','event_id']);
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
        Schema::dropIfExists('ranges');
    }
}
