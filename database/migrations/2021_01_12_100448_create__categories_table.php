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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ImgIcon_id')->nullable()->references('id')->on('files')->onDelete('set null');
            $table->foreignId('Img_id')->nullable()->references('id')->on('files')->onDelete('set null');
       

            $table->softDeletes();
            $table->timestamps();
        });
        Schema::create('Category_translations', function (Blueprint $table) {
            $table->id();
          
            $table->foreignId('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->string('Name',50);

            $table->string('locale')->index();

            $table->unique(['category_id','locale']);
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
        Schema::dropIfExists('Category_translations');
        Schema::dropIfExists('Categories');
      
    }
}
