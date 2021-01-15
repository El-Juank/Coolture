<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeUniqueFiles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    const UNIQUE_RULE="unique_file_path_name_format";
    public function up()
    {

        Schema::table('Files', function (Blueprint $table){
            $table->dropUnique('files_name_unique');
            $table->unique(['Path_id','Name','Format'],self::UNIQUE_RULE);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Files', function (Blueprint $table){
            $table->dropUnique(self::UNIQUE_RULE);
            $table->unique('Name');
        });
    }
}
