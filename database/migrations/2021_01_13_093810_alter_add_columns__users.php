<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterAddColumnsUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('users', function ($table) {
            $table->foreingId('Country_id')->references('id')->on('Locations')->onDelete('null')->null()->after('email');
            $table->foreingId('DefaultLocation_id')->references('id')->on('Locations')->onDelete('null')->null()->after('Country_id');
            $table->foreingId('UserVerified_id')->references('id')->on('Users')->null()->after('DefaultLocation_id');//qui l'ha verificat si es null es que no ho està
            $table->foreingId('ImgProfile_id')->references('id')->on('Files')->onDelete('null')->null()->after('UserVerified_id');
            $table->foreingId('ImgCover_id')->references('id')->on('Files')->onDelete('null')->null()->after('ImgProfile_id');
            
            $table->date('BirthDate')->after('ImgCover_id');
            $table->boolean('Gender')->null()->after('BirthDate');//si es null es que es other
            
        });
        

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function($table) {
            $table->dropColumn('Country_id');
            $table->dropColumn('DefaultLocation_id');
            $table->dropColumn('UserVerified_id');
            $table->dropColumn('ImgProfile_id');
            $table->dropColumn('ImgCover_id');
            $table->dropColumn('BirthDate');
            $table->dropColumn('Gender');

        });
    }
}
