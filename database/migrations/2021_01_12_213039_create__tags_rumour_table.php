<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagsRumourTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TagsRumour', function (Blueprint $table) {
            $table->id();

            $table->foreingId('Rumour_id')->references('id')->on('Rumours')->onDelete('cascade');
            $table->foreingId('Tag_id')->references('id')->on('Tags')->onDelete('cascade');
            $table->unique(['Rumour_id','Tag_id']);
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
        Schema::dropIfExists('TagsRumour');
    }
}
