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
            $table->foreignId('Country_id')->nullable()->after('email')->references('id')->on('Locations')->onDelete('set null');
            $table->foreignId('DefaultLocation_id')->nullable()->after('Country_id')->references('id')->on('Locations')->onDelete('set null');
            $table->foreignId('UserVerified_id')->nullable()->after('DefaultLocation_id')->references('id')->on('Users');//qui l'ha verificat si es null es que no ho està
            $table->foreignId('ImgProfile_id')->nullable()->after('UserVerified_id')->references('id')->on('Files')->onDelete('set null');
            $table->foreignId('ImgCover_id')->nullable()->after('ImgProfile_id')->references('id')->on('Files')->onDelete('set null');

            $table->date('BirthDate')->nullable($value = true)->after('ImgCover_id');
            $table->boolean('Gender')->nullable()->after('BirthDate');//si es null es que es other

            $table->softDeletes();

        });
        Schema::create('user_translations', function ($table) {
            $table->id();
            $table->foreignId('User_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('Descripcion',1500);
            $table->string('locale');

            $table->boolean('Visible')->default(true);
            $table->boolean('CanDelete')->default(false);

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
            $table->dropSoftDeletes();

        });
        Schema::dropIfExists('user_translations');

    }
}
