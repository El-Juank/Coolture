<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Location;
class LocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->decimal('Lat',7,4);
            $table->decimal('Lon',7,4);

            $table->softDeletes();
            $table->timestamps();
        });
        Schema::create('Location_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('location_id')->references('id')->on('locations')->onDelete('cascade');
            $table->string('Name',50);
            $table->string('locale')->index();

            $table->softDeletes();
            $table->timestamps();
        });

        $locations=['Espanya','Girona'];//aixi els ids existeixen
        for($i=0,$f=count($locations);$i<$f;$i++){
            $location=new Location();
            $location->{'Name:ca'}=$locations[$i];
            $location->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Location_translations');
        Schema::dropIfExists('Locations');

    }
}
