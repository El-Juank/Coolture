<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->integer('Priority');

            $table->softDeletes();
            $table->timestamps();
        });
        Schema::create('role_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('role_id')->references('id')->on('roles')->onDelete('cascade');

            $table->string('Name',50);
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
        Schema::dropIfExists('role_translations');
        Schema::dropIfExists('roles');
 
    }
}
