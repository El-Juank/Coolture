<?php

use Illuminate\Database\Seeder;

use App\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rolesEN=['Administrator','Moderator','EventMaker Editor','Url Verifier'];
        $rolesES=['Administrador','Moderador','Editor EventMaker','Verificador de Url'];
        $rolesCA=['Administrador','Moderador','Editor EventMaker','Verificador de Url'];
        $priority=[1,2,3,10];//ara son consecutius però no es lo normal
        
        $total=count($rolesEN);
        for($i=0;$i<$total;$i++){
            $role=new Role();

            $role->{'Name:ca'}=$rolesCA[$i];
            $role->{'Name:es'}=$rolesES[$i];
            $role->{'Name:en'}=$rolesEN[$i];

            $role->Priority=$priority[$i];

            $role->save();
        }
    }
}
