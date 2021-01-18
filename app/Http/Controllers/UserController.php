<?php

namespace App\Http\Controllers;

use App\Permission;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::get();
        $permissions = Permission::get();

        return view('users.index')
            ->with('users', $users)
            ->with('permissions', $permissions);
    }

    public function create()
    {
        $users = User::get();

        return view('users.create')
            ->with('users', $users);
    }

    public function store(Request $request)
    {
        //Validity rules
        $validated = $request->validate([
            'name' => 'required|min:4',
        ]);

        //Capta camps del formulari
        $name = $request['name'];

        //Crear  i posa valors del formulari
        $user = new user;
        $user->name = $name;

        //Guarda
        $user->save();

        //Mostra index
        return redirect()->route('users.index');
    }


    public function edit($id)
    {
        $user = User::find($id);

        return view('users.edit')
            ->with('user', $user);
    }

    public function update(Request $request, $id)
    {

        //Validació:
        $validated = $request->validate([
            'name' => 'required|min:4',
        ]);


        //Agafo valors del questionari
        $name = $request["name"];

        //Busques object
        $user = User::find($id);

        //Posa els valors del form
        $user->name = $name;

        $user->save();

        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('users.index');
    }
}
