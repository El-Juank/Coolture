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
        Schema::create('UrlRumoursToVerify', function (Blueprint $table) {
            $table->id();
            $table->foreignId('Rumour_id')->references('id')->on('Rumours')->onDelete('cascade');
            $table->foreignId('user_id')->nullable()->references('id')->on('users')->onDelete('set null');//si eliminen el compte que no elimini tot el que ha donat a la comunitat
            $table->string('Url',500);
            $table->boolean('ToConfirmed');
            $table->foreignId('VerifiedBy_id')->nullable()->references('id')->on('users')->onDelete('set null');
      
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
        Schema::dropIfExists('UrlRumoursToVerify');
    }
}
