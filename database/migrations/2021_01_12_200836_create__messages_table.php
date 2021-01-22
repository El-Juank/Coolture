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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();

            $table->foreignId('FromUser_id')->nullable()->references('id')->on('users')->onDelete('set null');
            $table->foreignId('ToUser_id')->nullable()->references('id')->on('users')->onDelete('set null');
            $table->string('Message',500);

            $table->date('Trashed')->nullable();//per si l'esborra l'usuari que es pugui veure fins que s'arregli el problema o s'esborra cada X temps
            $table->boolean('CanDelete')->default(false);//si està pendent de ser revisat

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
        Schema::dropIfExists('messages');
    }
}
