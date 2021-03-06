<?php

use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

//Prefix de l'idioma, translations implementat:
Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeCookieRedirect', 'localizationRedirect']], function () {

    Route::get('/', 'FrontendController@index')->name('index');

    Route::get('/test', 'Controller@test');

    Auth::routes();

    // ---------- RELACIONADES AMB FRONTEND CONTROLLER ----------- //

    //Elements corporatius de l'empresa (footer):
    Route::get('how-it-works', 'FrontendController@howItWorks')->name('howItWorks');
    Route::get('about-us', 'FrontendController@aboutUs')->name('aboutUs');

    Route::group(['middleware' => 'auth'], function () {
        Route::get('post-concert', 'FrontendController@postConcert')->name('post_concert');
    });

    Route::get('post-concert-rules', 'FrontendController@postConcertRules')->name('post_concert_rules');

    Route::get('terms-and-conditions', 'FrontendController@termsAndConditions')->name('terms_and_conditions');

    Route::get('privacy-policy', 'FrontendController@privacyPolicy')->name('privacy_policy');

    //Route::get('help', 'FrontendController@help')->name('help');


    //Categories (en anglès categories/category)
    Route::get('categories', 'FrontendController@categories')->name('categories');
    Route::get('categories/{category}', 'FrontendController@category')->name('category');

    //Events
    //Route::get('events', 'FrontendController@events')->name('events');
    Route::get('events/{event}', 'FrontendController@event')->name('event');
    Route::post('eventmakers/eventmaker_unNotify/{eventmaker}', 'FrontendController@eventmakerUnNotify')->name('eventmaker_unNotify');
    Route::post('eventmakers/eventmaker_notify/{eventmaker}', 'FrontendController@eventmakerNotify')->name('eventmaker_notify');

    Route::post('events/event_unNotify/{event}', 'FrontendController@eventUnNotify')->name('event_unNotify');
    Route::post('events/event_notify/{event}', 'FrontendController@eventNotify')->name('event_notify');

    Route::post('events/rumour_unNotify/{rumour}', 'FrontendController@rumourUnNotify')->name('rumour_unNotify');
    Route::post('events/rumour_notify/{rumour}', 'FrontendController@rumourNotify')->name('rumour_notify');


    //Rumors (els que poden posar els usuaris)
    // Route::get('rumours', 'FrontendController@rumours')->name('rumours');
    Route::get('rumours/{rumour}', 'FrontendController@rumour')->name('rumour');

    //Buscador
    Route::get('categorySearch/{category}', 'FrontendController@CategorySearch')->name('categorySearch');
    //Route::get('search', 'FrontendController@search')->name('search');
    Route::get('search/search_result', 'FrontendController@searchResult')->name('search_result');

    //EventMaker (pàg artista)
    // Route::get('eventmakers', 'FrontendController@eventmakers')->name('eventmakers');
    Route::get('eventmakers/{eventmaker}', 'FrontendController@eventmaker')->name('eventmaker');


    // ------------ RELACIONADES AMB FUNCIONALITAT LOGIN------------ //
    Route::group(['middleware' => 'auth'], function () {

        //  Route::post('logout','Controller@logout')->name('logout');

        // Pàgina principal de configuació: segons el rol de l'user tindrà més o menys funcionalitats
        Route::get('home', 'FrontendController@home')->name('home');
        //no se si va aqui
        Route::get('notifications', 'FrontendController@notifications')->name('notifications');
        Route::get('eventNotification/{event}', 'FrontendController@eventNotification')->name('eventNotification');
        Route::get('eventMakerNotification/{eventmaker}', 'FrontendController@eventMakerNotification')->name('eventMakerNotification');
        Route::get('rumourNotification/{rumour}', 'FrontendController@rumourNotification')->name('rumourNotification');

        //Editor perfil
        Route::resource('profile', 'ProfileController');

        //Pàgina per veure els events que l'usuari està seguint
        Route::get('following/{id}', 'FrontendController@following')->name('following');

        // ADMINISTRADOR: Per fer CRUD de quasi tots els elements de la web: categories, events, rumors, artistes, users i missatges:
        Route::group(['prefix' => 'admin'], function () {

            Route::resources([
                'categories' => 'CategoryController',
                'events' => 'EventController',
                'users' => 'UserController',
                'rumours' => 'RumourController',
                // 'eventmaker' => 'EventMakerController',
                // 'messages' => 'MessageController'
            ]);
        });

        //Ruta per fer posts de missatges d'EVENTS (només usuaris logguejats):
        Route::post('events/{event}/eventmessage', 'FrontendController@eventmessage')->name('eventmessage');

        //Ruta per fer posts de missatges de RUMORS (només usuaris logguejats):
        Route::post('rumours/{rumour}/rumourmessage', 'FrontendController@rumourmessage')->name('rumourmessage');

        //Ruta del botó FOLLOW:
        Route::post('eventmakers/{eventmaker}/follow', 'FrontendController@follow')->name('follow');
        //Ruta del botó UNFOLLOW:
        Route::post('eventmakers/{eventmaker}/unfollow', 'FrontendController@unfollow')->name('unfollow');

        //Events -> Rutes like
        Route::post('events/{event}/like', 'FrontendController@event_like')->name('event_like');
        Route::post('events/{event}/unlike', 'FrontendController@event_unlike')->name('event_unlike');

        //Rumour -> Rutes like
        Route::post('rumours/{rumour}/like', 'FrontendController@rumour_like')->name('rumour_like');
        Route::post('rumours/{rumour}/unlike', 'FrontendController@rumour_unlike')->name('rumour_unlike');
    });
});
