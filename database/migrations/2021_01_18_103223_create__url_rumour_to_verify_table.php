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
        Schema::create('UrlRumourToVerify', function (Blueprint $table) {
            $table->id();
            $table->foreignId('Rumour_id')->references('id')->on('Rumours')->onDelete('cascade');
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('Url',500);
            $table->boolean('ToConfirmed');
            $table->foreignId('VerifiedBy_id')->nullable()->references('id')->on('users')->onDelete('cascade');
      
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
        Schema::dropIfExists('UrlRumourToVerify');
    }
}
