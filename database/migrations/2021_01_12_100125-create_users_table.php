<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

use App\User;

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
  

            $table->foreignId('Country_id')->default(App\Location::DEFAULT_COUNTRY)->references('id')->on('locations')->onDelete('set default');
            $table->foreignId('DefaultLocation_id')->default(App\Location::DEFAULT_LOCATION)->references('id')->on('locations')->onDelete('set default');
    
            $table->foreignId('ImgProfile_id')->default(App\File::IMG_PROFILE)->references('id')->on('files')->onDelete('set default');
            $table->foreignId('ImgCover_id')->default(App\File::IMG_COVER)->references('id')->on('files')->onDelete('set default');

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
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('Description',1500);
            $table->boolean('Visible')->default(true);
            $table->boolean('CanDelete')->default(false);
            $table->string('locale')->index();
            $table->timestamps();

        });

        $comunityUser= new User();
        $comunityUser->id=User::COMUNITY_ID;
        $comunityUser->name='Community';
        $comunityUser->email='comunity@coolutre.com';
        $comunityUser->password=Hash::make(Faker\Factory::create()->word());
        $comunityUser->save();

        Schema::table('users',function ($table){
            $table->foreignId('UserVerified_id')->default(1)->references('id')->on('users');//qui l'ha verificat si es null es que no ho està
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_translations');
        Schema::dropIfExists('users');

    }
}
