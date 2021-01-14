<?php

use Illuminate\Support\Facades\Route;
// use Mcamara\LaravelLocalization\Facades\LaravelLocalization;



//Caldrà posar abans de tot el prefix de l'idioma, quan implementem translations:
// Route::group(['prefix' => LaravelLocalization::setLocale()], function () {
// });


Route::get('/', function () {
    return view('index');
});

Route::get('/home', 'FrontendController@index');

Auth::routes();

// ---------- RELACIONADES AMB FRONTEND CONTROLLER ----------- //

//Elements corporatius de l'empresa (footer): redirigir a una part de la pàgina o fer una ruta per cada enllaç amb la seva vista.
Route::get('about-us', 'FrontendController@aboutUs')->name('aboutUs');
Route::get('help', 'FrontendController@help')->name('help');
Route::get('legal', 'FrontendController@legal')->name('legal');
Route::get('contact', 'FrontendController@contact')->name('contact');

//Gèneres (en anglès genres/genre)
Route::get('genres', 'FrontendController@genres')->name('genres');
Route::get('genres/{genre}', 'FrontendController@genre')->name('genre');

//Events
Route::get('events', 'FrontendController@events')->name('events');
Route::get('events/{event}', 'FrontendController@event')->name('event');

//Rumors (els que poden posar els usuaris)
Route::get('rumours', 'FrontendController@rumours')->name('rumours');
Route::get('rumours/{rumour}', 'FrontendController@rumour')->name('rumour');

//Buscador
Route::get('search', 'FrontendController@search')->name('search');
Route::get('search/result_search', 'FrontendController@resultSearch')->name('result_search');


// ------------ RELACIONADES AMB FUNCIONALITAT LOGIN------------ //
Route::group(['middleware' => 'auth'], function () {

    // Pàgina principal de configuació: segons el rol de l'user tindrà més o menys funcionalitats
    Route::get('home', 'FrontendController@home')->name('home');


    // ADMINISTRADOR: Per fer CRUD de quasi tots els elements de la web: categories, events, rumors, artistes, users i missatges:
    Route::group(['prefix' => 'admin'], function () {

        Route::resources([
            'categories' => 'CategoryController',
            'events' => 'EventController',
            'rumours' => 'RumourController',
            'artists' => 'ArtistController',
            'users' => 'UserController',
            'messages' => 'MessageController'
        ]);
    });
});
