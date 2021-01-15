<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameColumnUserTranslation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('User_Translations', function (Blueprint $table){
            $table->renameColumn('Descripcion','Description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('User_Translations', function (Blueprint $table){
            $table->renameColumn('Description','Descripcion');
        });
    }
}
