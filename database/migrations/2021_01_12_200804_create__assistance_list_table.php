<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssistanceListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('AssistanceList', function (Blueprint $table) {
            $table->id();

            $table->foreignId('User_id');
            $table->foreignId('Event_id');

            $table->boolean('WantToAssist');
            $table->boolean('Assisted');
            
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
        Schema::dropIfExists('_assistance_list');
    }
}
