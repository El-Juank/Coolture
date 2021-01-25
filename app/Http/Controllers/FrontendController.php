<?php

namespace App\Http\Controllers;

use App\User;
use App\Category;
use App\Event;
use App\EventMaker;
use App\EventMakerTranslation;
use App\EventMessage;
use App\EventTranslation;
use App\LikeEvent;
use App\LikeEventMessage;
use App\LikeRumour;
use App\Permission;
use App\Rumour;
use App\RumourMessage;
use App\RumourTranslation;
use App\UserRange;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
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
        $events = Event::where('user_id', $user_id)
            ->orderBy('created_at', 'DESC')
            ->get();
        $rumours = Rumour::where('user_id', $user_id)
            ->orderBy('created_at', 'DESC')
            ->get();

        //Per veure els permissos de l'usuari
        $permissions = Permission::get();
        return view('home')
            ->with('permissions', $permissions)
            ->with('events', $events)
            ->with('rumours', $rumours);
    }
    public function notifications()
    {
        //ho posso aqui de moment
        return view('profile.notifications')->with('user', Auth::user());
    }
    public function eventNotification($id)
    {
        if (is_numeric($id)) {
            Event::find($id)->NotificationChangeSeen(Auth::user());
            $result = redirect(route('event', ['event' => $id]));
        } else {
            Auth::user()->ClearNotificationChangeEvents();
            $result = redirect(route('notifications'));
        }
        return $result;
    }
    public function eventMakerNotification($id)
    {
        if (is_numeric($id)) {
            EventMaker::find($id)->NotificationChangeSeen(Auth::user());
            $result = redirect(route('eventmaker', ['eventmaker' => $id]));
        } else {
            Auth::user()->ClearNotificationChangeEventMakers();
            $result = redirect(route('notifications'));
        }
        return $result;
    }
    public function rumourNotification($id)
    {
        if (is_numeric($id)) {
            Rumour::find($id)->NotificationChangeSeen(Auth::user());
            $result = redirect(route('rumour', ['rumour' => $id]));
        } else {
            Auth::user()->ClearNotificationChangeRumours();
            $result = redirect(route('notifications'));
        }
        return $result;
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
        $categories = Category::get();
        return view('frontend.post_concert')
            ->with('categories', $categories);
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
        $userranges = UserRange::where('user_id', Auth::user()->id)->get();
        $events = Event::find($id);
        $rumours = Rumour::find($id);

        return view('following')
            ->with('events', $events)
            ->with('rumours', $rumours)
            ->with('userranges', $userranges)
            ->with('permissions', $permissions);
    }

    public function event($id)
    {
        //Informació bàsica sobre aquell event
        $event = Event::find($id);

        //Missatges de l'event
        $messages = EventMessage::where('Event_id', $id)
            ->orderBy('created_at', 'DESC')
            ->get();

        //Likes de l'event
        $likes = LikeEvent::where('Event_id', $id)->count();

        //Informació localització
        $lat = Event::find($id)->Location->Lat;
        $lon = Event::find($id)->Location->Lon;
        $city = Http::get('https://eu1.locationiq.com/v1/reverse.php?key=pk.e51380d19bd89346317f3ab725a12aaf&lat=' . $lat . '&lon=' . $lon . '&format=json&zoom=10');

        $city = json_decode($city);


        return view('frontend.event_detall')
            ->with('event', $event)
            ->with('messages', $messages)
            ->with('likes', $likes)
            ->with('city', $city);
    }

    public function eventmessage(Request $request, $id)
    {
        $request->validate([
            'eventmessage_text' => 'required|min:4',
        ]);

        $eventmessage = new EventMessage;
        $eventmessage->Event_id = $id;
        $eventmessage->user_id = Auth::user()->id;
        $eventmessage->Visible = 1;
        $eventmessage->Message = $_POST['eventmessage_text'];
        $eventmessage->CanDelete = 1;

        $eventmessage->save();

        return redirect()->back();
    }

    public function rumour($id)
    {
        //Informació bàsica sobre aquell rumor
        $rumour = Rumour::find($id);

        //Missatges del rumor
        $messages = RumourMessage::where('Rumour_id', $id)
            ->orderBy('created_at', 'DESC')
            ->get();

        //Likes del rumor
        $likes = LikeRumour::where('Rumour_id', $id)->count();

        return view('frontend.rumour_detall')
            ->with('rumour', $rumour)
            ->with('messages', $messages)
            ->with('likes', $likes);
    }

    public function rumourmessage(Request $request, $id)
    {
        $request->validate([
            'rumourmessage_text' => 'required|min:4',
        ]);

        $rumourmessage = new RumourMessage;
        $rumourmessage->Rumour_id = $id;
        $rumourmessage->user_id = Auth::user()->id;
        $rumourmessage->Message = $_POST['rumourmessage_text'];

        $rumourmessage->save();

        return redirect()->back();
    }


    //EventMaker (Pàgina detall d'aquell eventMaker amb els seus Events i Rumors)
    public function eventmaker($id)
    {
        $eventmaker = EventMaker::find($id);

        return view("frontend.eventmaker_detall")
            ->with('eventmaker', $eventmaker);
    }

    // Follow a un Eventmaker
    public function follow($id)
    {
        $eventmaker = EventMaker::find($id);
        EventMaker::find($id)->Follow(Auth::user(), $eventmaker->id);

        return redirect()->back();
    }

    // Unfollow a un Eventmaker
    public function unfollow($id)
    {
        $eventmaker = EventMaker::find($id);
        EventMaker::find($id)->UnFollow(Auth::user(), $eventmaker->id);

        return redirect()->back();
    }

    // EVENT - Funció de DONAR like:
    public function event_like($id)
    {
        Event::find($id)->SetLike(Auth::user());

        return redirect()->back();
    }

    // EVENT - Funció de TREURE like:
    public function event_unlike($id)
    {
        Event::find($id)->UnsetLike(Auth::user());

        return redirect()->back();
    }

    // RUMOUR - Funció de DONAR like:
    public function rumour_like($id)
    {
        Rumour::find($id)->SetLike(Auth::user());

        return redirect()->back();
    }

    // RUMOUR - Funció de TREURE like:
    public function rumour_unlike($id)
    {
        Rumour::find($id)->UnsetLike(Auth::user());

        return redirect()->back();
    }


    //Controlador para la página "searchResult"
    public function searchResult()
    {
        $title = $_GET["title"];
        $locale = LaravelLocalization::getCurrentLocale(); //Agafar l'idioma de l'usuari

        //Agafem els events i els rumors
        $events = EventTranslation::where('locale', $locale)->where('Title', 'like', '%' . $title . '%')->get();
        $rumours = RumourTranslation::where('locale', $locale)->where('Title', 'like', '%' . $title . '%')->get();
        $eventmakers = EventMakerTranslation::where('Name', 'like', '%' . $title . '%')->get();

        return view('frontend.search_result')
            ->with('events', $events)
            ->with('rumours', $rumours)
            ->with('eventmakers', $eventmakers);
    }
}
