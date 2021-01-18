<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Role;
use App\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker= Faker\Factory::create();

        $users=User::get();
        $roles=Role::get();
        $totalUsers=count($users)-1;
        $totalRols=count($roles)-1;
        for($i=0;$i<=$totalUsers;$i++){
            for($j=0;$j<=$totalRols;$j++){
                
                if($faker->boolean()){
                    $permission=new Permission();
                    $permission->GrantedBy=$users[$faker->numberBetween(0,$totalUsers)]->id;
                    $permission->Role_id=$roles[$j]->id;
                    $permission->User_id=$users[$i]->id;
                    $permission->save();
                }
            }
        }
    }
}
