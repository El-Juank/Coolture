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
            $table->foreignId('user_id')->nullable()->references('Id')->on('users')->onDelete('set null');
            $table->foreignId('event_maker_id')->nullable()->references('Id')->on('eventmakers')->onDelete('set null');
      
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
