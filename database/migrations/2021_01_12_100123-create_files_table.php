<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    const UNIQUE_RULE="unique_file_path_name_format";
    public function up()
    {
        Schema::create('Files', function (Blueprint $table) {
            $table->id();
            $table->foreignId('Path_id')->references('id')->on('Paths')->onDelete('cascade');//aixi no repeteixo el path fins arribar al fitxer
            $table->string('Name',50);
            $table->string('Format',10);
            
            $table->unique(['Path_id','Name','Format'],self::UNIQUE_RULE);

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
        Schema::dropIfExists('Files');
    }
}
