<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRumoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rumours', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->default(App\User::COMUNITY_ID);
            $table->foreignId('event_maker_id')->references('id')->on('eventmakers')->onDelete('cascade');
            $table->unsignedBigInteger('ImgPreview_id')->default(App\File::IMG_PROFILE);
            $table->unsignedBigInteger('ImgCover_id')->default(App\File::IMG_COVER);
            $table->boolean('IsVisible');
            $table->integer('OwnTrust');


            $table->softDeletes();
            $table->timestamps();
        });
        Schema::create('Rumour_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rumour_id')->references('id')->on('rumours')->onDelete('cascade');
       
            $table->string('Title',150);
            $table->string('Description',750);
            $table->string('locale')->index();

            
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
        Schema::dropIfExists('Rumour_translations');
        Schema::dropIfExists('Rumours');

    }
}
