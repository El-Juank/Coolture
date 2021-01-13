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
        Schema::create('Ranges', function (Blueprint $table) {
            $table->id();

            $table->foreignId('Location_id')->references('id')->on('Locations')->onDelete('cascade');
            $table->foreignId('Event_id')->references('id')->on('Events')->onDelete('cascade');
            $table->decimal('Range',10,2);
            $table->unique(['Location_id','Event_id']);
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
        Schema::dropIfExists('Ranges');
    }
}
