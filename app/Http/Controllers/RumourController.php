<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Rumour;
use Illuminate\Http\Request;

class RumourController extends Controller
{
    public function index()
    {
        $rumours = Rumour::get();
        $permissions = Permission::get();

        return view('rumours.index')
            ->with('rumours', $rumours)
            ->with('permissions', $permissions);
    }

    public function create()
    {
        $rumours = Rumour::get();

        return view('rumours.create')
            ->with('rumours', $rumours);
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
        $rumour = new Rumour;
        $rumour->name = $name;

        //Guarda
        $rumour->save();

        //Mostra index
        return redirect()->route('rumours.index');
    }


    public function edit($id)
    {
        $rumour = Rumour::find($id);

        return view('rumours.edit')
            ->with('rumour', $rumour);
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
        $rumour = Rumour::find($id);

        //Posa els valors del form
        $rumour->name = $name;

        $rumour->save();

        return redirect()->route('rumours.index');
    }

    public function destroy($id)
    {
        $rumour = Rumour::find($id);
        $rumour->delete();

        return redirect()->route('rumours.index');
    }
}