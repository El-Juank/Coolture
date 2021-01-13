<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Categories', function (Blueprint $table) {
            $table->id();
            $table->string('ImgIcon',150);

            $table->softDeletes();
            $table->timestamps();
        });
        Schema::create('Categories_translations', function (Blueprint $table) {
            $table->id();
          
            $table->foreign('Category_id')->references('id')->on('Categories')->onDelete('cascade');
            $table->string('Name',50);

            $table->string('locale')->index();

            $table->unique(['Category_id','locale']);
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
        Schema::dropIfExists('Categories');
        Schema::dropIfExists('Categories_translations');
    }
}
