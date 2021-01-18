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
        Schema::create('Rumours', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->references('Id')->on('users')->onDelete('set null');
            $table->foreignId('Event_Maker_id')->nullable()->references('Id')->on('EventMakers')->onDelete('set null');
      
            $table->boolean('IsVisible');
            $table->integer('OwnTrust');

            $table->string('UrlOfficialDenied',500)->nullable();//si es un rumor desmentit
            $table->string('UrlOfficialConfirmed',500)->nullable();//si es un rumor que ha passat a ser oficial ->si tenen els dos es que al final han fet oficial algo que en un principi deien que no.


            $table->softDeletes();
            $table->timestamps();
        });
        Schema::create('Rumour_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('Rumour_id')->references('id')->on('Rumours')->onDelete('cascade');
       
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
