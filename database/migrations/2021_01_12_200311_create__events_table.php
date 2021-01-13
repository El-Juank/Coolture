<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { //els null son perque potser al entrar la noticia no es tingui clar
        Schema::create('Events', function (Blueprint $table) {
            $table->id();

            $table->foreignId('User_id');//qui el pot editar/ qui l'ha fet
            $table->foreignId('EventMaker_id');
            $table->foreingId('Location_id')->null();

            $table->string('Title',150);
            $table->string('Descripcion',750)->null();
            $table->string('ImgEvent',150)->null();
            $table->string('ImgPreview',150)->null();
           
            $table->date('InitDate')->null();
            $table->datetime('Duration')->null();

            $table->boolean('Published');//per si es vol fer poc a poc fins publicar-ho
            
            $table->softDeletes();//per evitar problemes ja que hi ha molt derrere i s'ha de poder revisar
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
        Schema::dropIfExists('Events');
    }
}
