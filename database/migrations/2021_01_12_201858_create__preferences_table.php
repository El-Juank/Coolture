<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Preferences', function (Blueprint $table) {
            $table->id();
            $table->foreingId('User_id')->references('id')->on('Users')->onDelete('cascade');
            $table->json('UserConfig');

            $table->unique('User_id');
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
        Schema::dropIfExists('Preferences');
    }
}
