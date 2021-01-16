<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnEventTranslations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       
        Schema::table('Events', function (Blueprint $table){
            $table->renameColumn('EventMaker_id','Event_Maker_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        Schema::table('Events', function (Blueprint $table){
            $table->renameColumn('Event_Maker_id','EventMaker_id');
        });
    }
}
