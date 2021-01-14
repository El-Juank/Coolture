<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameColumnEventTranslations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Events_translations',function (Blueprint $table){
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
        Schema::table('Events_translations',function (Blueprint $table){
            $table->renameColumn('Description','Descripcion');
        });
    }
}
