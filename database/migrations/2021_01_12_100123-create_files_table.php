<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Path;

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
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->foreignId('path_id')->references('id')->on('paths')->onDelete('cascade');//aixi no repeteixo el path fins arribar al fitxer
            $table->string('Name',50);
            $table->string('Format',10);
            
            $table->unique(['path_id','Name','Format'],self::UNIQUE_RULE);

            $table->timestamps();
        });
        FileSeeder::AddFiles(Path::find(Path::DEFAULT_PATH_ID),Path::DEFAULT_PATH_ID);
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
