<?php

namespace App\Http\Controllers;

use App\Event;
use App\EventMessage;
use App\EventTranslation;
use App\Permission;
use App\Rumour;
use App\RumourTranslation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class FrontendController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function home()
    {
        //Agafa propietats de l'user loggejat en aquell moment
        $user_id = Auth::user()->id;
        $events = Event::where('User_id', $user_id)
            ->orderBy('created_at', 'DESC')
            ->get();
        $rumours = Rumour::where('User_id', $user_id)
            ->orderBy('created_at', 'DESC')
            ->get();

        //Per veure els permissos de l'usuari
        $permissions = Permission::get();
        return view('home')
            ->with('permissions', $permissions)
            ->with('events', $events)
            ->with('rumours', $rumours);
    }

    public function howItWorks()
    {
        return view('frontend.how-it-works');
    }

    public function aboutUs()
    {
        return view('frontend.about-us');
    }

    public function postConcert()
    {
        return view('frontend.post_concert');
    }

    public function postConcertRules()
    {
        return view('frontend.post_concert_rules');
    }

    public function termsAndConditions()
    {
        return view('frontend.terms_and_conditions');
    }

    public function privacyPolicy()
    {
        return view('frontend.privacy_policy');
    }

    //Pàgina per veure els events que l'usuari està seguint
    public function following($id)
    {
        //Per veure els permissos de l'usuari
        $permissions = Permission::get();

        $events = Event::find($id);
        $rumours = Rumour::find($id);
        return view('following')
            ->with('events', $events)
            ->with('rumours', $rumours)
            ->with('permissions', $permissions);
    }

    public function event($id)
    {
        //Informació bàsica sobre aquell event
        $event = Event::find($id);

        return view('frontend.event_detall')
            ->with('event', $event);
    }

    public function rumour($id)
    {
        //Informació bàsica sobre aquell event
        $rumour = Rumour::find($id);

        return view('frontend.rumour_detall')
            ->with('rumour', $rumour);
    }

    //Controlador para la página "searchResult"
    public function searchResult()
    {
        $title = $_GET["title"];
        $locale = LaravelLocalization::getCurrentLocale(); //Agafar l'idioma de l'usuari

        //Agafem els events i els rumors
        $events = EventTranslation::where('locale', $locale)->where('Title', 'like', '%' . $title . '%')->get();
        $rumours = RumourTranslation::where('locale', $locale)->where('Title', 'like', '%' . $title . '%')->get();

        //Els posem en una única col·lecció perque ens retorni els resultats barrejats
        $results = collect($events)->merge($rumours);

        return view('frontend.search_result')
            ->with('results', $results);
    }
}
