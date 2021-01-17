<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
  

            $table->foreignId('Country_id')->nullable()->references('id')->on('Locations')->onDelete('set null');
            $table->foreignId('DefaultLocation_id')->nullable()->references('id')->on('Locations')->onDelete('set null');
            $table->foreignId('UserVerified_id')->nullable()->references('id')->on('Users');//qui l'ha verificat si es null es que no ho està
            $table->foreignId('ImgProfile_id')->nullable()->references('id')->on('Files')->onDelete('set null');
            $table->foreignId('ImgCover_id')->nullable()->references('id')->on('Files')->onDelete('set null');

            $table->date('BirthDate')->nullable();
            $table->boolean('Gender')->nullable();//si es null es que es other

            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();

            $table->softDeletes();
            $table->timestamps();
        });
 
        Schema::create('user_translations', function ($table) {
            $table->id();
            $table->foreignId('User_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('Description',1500);
            $table->boolean('Visible')->default(true);
            $table->boolean('CanDelete')->default(false);
            $table->string('locale')->index();
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
        Schema::dropIfExists('users');
        Schema::dropIfExists('user_translations');
    }
}
