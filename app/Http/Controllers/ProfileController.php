<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Permission;

class ProfileController extends Controller
{
    /**
     * Update user profile & make backend push to DB
     *
     **/

    public function edit($id)
    {

        //A partir de l'id passat per el "Auth::user" busquem l'usuari a la BD
        $user = User::find($id);

        //Per veure els permissos de l'usuari
        $permissions = Permission::get();
        return view('profile.edit')
            ->with('user', $user)
            ->with('permissions', $permissions);
        //Anem a la vista "edit" amb l'usuari de la BD per modificar-lo
    }


    public function update(Request $request, $id)
    {
        //Possem "restriccions" a l'hora d'enviar el formulari
        $validated = $request->validate([
            'name' => 'required|min:4',
        ]);

        $name = $_POST["name"];
        $user = User::find($id);
        $user->name = $name;
        $user->save();

        //Tornem a la mateixa vista
        return back()->withInput();
    }
}
