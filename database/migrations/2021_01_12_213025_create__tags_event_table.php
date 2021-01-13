<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagsEventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TagsEvent', function (Blueprint $table) {
            $table->id();
            $table->foreignId('Event_id')->references('id')->on('Events')->onDelete('cascade');
            $table->foreignId('Tag_id')->references('id')->on('Tags')->onDelete('cascade');
            $table->unique(['Event_id','Tag_id']);
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
        Schema::dropIfExists('TagsEvent');
    }
}
