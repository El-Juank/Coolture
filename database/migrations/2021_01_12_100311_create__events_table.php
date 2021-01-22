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

            $table->foreignId('user_id')->nullable()->references('id')->on('users')->onDelete('set null');; //qui el pot editar/ qui l'ha fet
            $table->foreignId('event_maker_id')->references('id')->on('eventmakers')->onDelete('cascade');
            $table->foreignId('location_id')->nullable()->references('id')->on('locations')->onDelete('set null');
            $table->foreignId('ImgEvent_id')->nullable()->references('id')->on('files')->onDelete('set null');
            $table->foreignId('ImgPreview_id')->nullable()->references('id')->on('files')->onDelete('set null');

            $table->date('InitDate')->nullable();
            $table->datetime('Duration')->nullable();

            $table->boolean('Published')->default(false); //per si es vol fer poc a poc fins publicar-ho

            $table->softDeletes(); //per evitar problemes ja que hi ha molt derrere i s'ha de poder revisar
            $table->timestamps();
        });
        Schema::create('event_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->references('id')->on('events')->onDelete('cascade');

            $table->string('Title', 150);
            $table->string('Description', 750)->nullable();

            $table->string('locale')->index();

            $table->unique(['event_id', 'locale']);
            $table->softDeletes(); //per evitar problemes ja que hi ha molt derrere i s'ha de poder revisar
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
        Schema::dropIfExists('Event_translations');
        Schema::dropIfExists('Events');
    
    }
}
