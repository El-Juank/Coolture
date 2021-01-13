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

            $table->foreingId('Category_id');
            $table->foreingId('EventMaker_id');

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
