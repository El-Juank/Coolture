<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUrlRumourToVerifyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('urlrumourstoverify', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rumour_id')->references('id')->on('rumours')->onDelete('cascade');
            $table->unsignedBigInteger('user_id')->default(App\User::COMUNITY_ID);//si eliminen el compte que no elimini tot el que ha donat a la comunitat
            $table->string('Url',500);
            $table->boolean('ToConfirmed');
            $table->unsignedBigInteger('VerifiedBy_id')->default(App\User::COMUNITY_ID);
      
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
        Schema::dropIfExists('urlrumourstoverify');
    }
}
