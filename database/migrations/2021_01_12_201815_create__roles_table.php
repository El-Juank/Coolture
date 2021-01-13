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
        Schema::create('Roles', function (Blueprint $table) {
            $table->id();
            $table->integer('Priority');

            $table->softDeletes();
            $table->timestamps();
        });
        Schema::create('Roles_translations', function (Blueprint $table) {
            $table->id();
            $table->foreingId('Role_id')->references('id')->on('Roles')->onDelete('cascade');

            $table->string('Name',50);
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
        Schema::dropIfExists('Roles');
        Schema::dropIfExists('Roles_translations');
    }
}
