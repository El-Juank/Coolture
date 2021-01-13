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
            $table->boolean('IsVisible');
            $table->integer('OwnTrust');

            $table->string('Url_OfficialDenied',500)->null();//si es un rumor desmentit
            $table->string('Url_OfficialConfirmed',500)->null();//si es un rumor que ha passat a ser oficial ->si tenen els dos es que al final han fet oficial algo que en un principi deien que no.


            $table->softDeletes();
            $table->timestamps();
        });
        Schema::create('Rumours_translations', function (Blueprint $table) {
            $table->id();
            $table->foreingId('Rumour_id')->references('id')->on('Rumours')->onDelete('cascade');
            $table->string('Title',150);
            $table->string('Description',750);
            $table->string('locale');

            
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
        Schema::dropIfExists('Rumours');
        Schema::dropIfExists('Rumours_translations');
    }
}
