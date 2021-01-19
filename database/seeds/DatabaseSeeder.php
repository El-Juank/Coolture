<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
     
        $this->call(PathSeeder::class);
        $this->call(FileSeeder::class);
        $this->call(LocationSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(UserSeeder::class);
        $this->call(EventMakerSeeder::class);
        $this->call(RumourSeeder::class);
        $this->call(EventSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(PermissionSeeder::class);

        $this->call(EventMessageSeeder::class);
        $this->call(RumourMessageSeeder::class);

        $this->call(LikeEventSeeder::class);
        $this->call(LikeRumourSeeder::class);
        $this->call(LikeEventMessageSeeder::class);
        $this->call(LikeRumourMessageSeeder::class);
        $this->call(AssistanceSeeder::class);
      
        $this->call(MessageSeeder::class);
        $this->call(RangeSeeder::class);
        $this->call(SubcategorySeeder::class);
        $this->call(TagSeeder::class);
        $this->call(TagEventSeeder::class);    
        $this->call(TagRumourSeeder::class);
        $this->call(UserRangeSeeder::class);
        $this->call(NotificationSeeder::class);
        $this->call(NotificationChangeEventSeeder::class);
        $this->call(NotificationChangeEventMakerSeeder::class);
        $this->call(NotificationChangeRumourSeeder::class);
 
        //fins aqui
      // $this->call(PreferenceSeeder::class);//s'ha de mirar com fer-ho desde el front end

   
    }
}
