<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToRumours extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Rumours', function (Blueprint $table) {
            $table->foreignId('EventMaker_id')->nullable()->after('id')->references('Id')->on('EventMakers')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Rumours', function (Blueprint $table) {
            $table->dropColumn('EventMaker_id');
        });
    }
}
