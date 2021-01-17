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
            $table->foreignId('ImgIcon_id')->nullable()->references('id')->on('Files')->onDelete('set null');
            $table->foreignId('Img_id')->nullable()->references('id')->on('Files')->onDelete('set null');
       

            $table->softDeletes();
            $table->timestamps();
        });
        Schema::create('Category_translations', function (Blueprint $table) {
            $table->id();
          
            $table->foreignId('Category_id')->references('id')->on('Categories')->onDelete('cascade');
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
        Schema::dropIfExists('Category_translations');
    }
}
