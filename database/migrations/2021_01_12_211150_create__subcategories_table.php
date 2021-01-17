<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {//ja que un EventMaker pot tenir moltes subCategories doncs
        Schema::create('Subcategories', function (Blueprint $table) {
            $table->id();

            $table->foreignId('Category_id')->references('id')->on('Categories')->onDelete('cascade');
            $table->foreignId('Event_Maker_id')->references('id')->on('EventMakers')->onDelete('cascade');

            $table->unique(['Category_id','Event_Maker_id']);
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
        Schema::dropIfExists('Subcategories');
    }
}
