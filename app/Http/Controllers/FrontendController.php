<?php

namespace App\Http\Controllers;

use App\Event;
use App\Rumour;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function home()
    {
        return view('home');
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
        $events = Event::find($id);
        $rumours = Rumour::find($id);
        return view('following')
            ->with('events', $events)
            ->with('rumours', $rumours);
    }
}
