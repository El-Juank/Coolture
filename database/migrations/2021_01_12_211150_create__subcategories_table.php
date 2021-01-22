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
        Schema::create('subcategories', function (Blueprint $table) {
            $table->id();

            $table->foreignId('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreignId('event_maker_id')->references('id')->on('eventmakers')->onDelete('cascade');

            $table->unique(['category_id','event_maker_id']);
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
        Schema::dropIfExists('subcategories');
    }
}
