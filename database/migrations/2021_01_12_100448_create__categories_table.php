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
            $table->unsignedBigInteger('ImgIcon_id')->default(App\File::IMG_PROFILE);
            $table->unsignedBigInteger('Img_id')->default(App\File::IMG_COVER);
       

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
