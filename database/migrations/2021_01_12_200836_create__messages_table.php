<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Messages', function (Blueprint $table) {
            $table->id();

            $table->foreingId('FromUser_id');
            $table->foreingId('ToUser_id');
            $table->string('Message',500);

            $table->date('Trashed')->null();//per si l'esborra l'usuari que es pugui veure fins que s'arregli el problema o s'esborra cada X temps
            $table->boolean('CanDelete');//si està pendent de ser revisat

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
        Schema::dropIfExists('_messages');
    }
}
