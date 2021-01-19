<?php

namespace App\Http\Controllers;

use App\Event;
use App\Permission;
use App\User;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::get();
        $permissions = Permission::get();

        return view('events.index')
            ->with('events', $events)
            ->with('permissions', $permissions);
    }

    public function create()
    {
        $events = Event::get();

        return view('events.create')
            ->with('events', $events);
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
        $event = new Event;
        $event->name = $name;

        //Guarda
        $event->save();

        //Mostra index
        return redirect()->route('events.index');
    }


    public function edit($id)
    {
        $event = Event::find($id);
        $users = User::get();

        return view('events.edit')
            ->with('event', $event)
            ->with('users', $users);
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
        $event = Event::find($id);

        //Posa els valors del form
        $event->name = $name;

        $event->save();

        return redirect()->route('events.index');
    }

    public function destroy($id)
    {
        $event = Event::find($id);
        $event->delete();

        return redirect()->route('events.index');
    }
}
