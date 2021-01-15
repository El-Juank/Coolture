<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Locations', function (Blueprint $table) {
            $table->id();
            $table->decimal('Lat',7,4);
            $table->decimal('Lon',7,4);

            $table->softDeletes();
            $table->timestamps();
        });
        Schema::create('Location_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('Location_id')->references('id')->on('Locations')->onDelete('cascade');
            $table->string('Name',50);

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
        Schema::dropIfExists('Locations');
        Schema::dropIfExists('Location_translations');
    }
}
